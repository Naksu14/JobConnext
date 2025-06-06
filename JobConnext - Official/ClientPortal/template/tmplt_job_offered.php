<?php
include '../db_con/db_connection.php';


if (isset($_SESSION['client_id'])) {
    $clientId = $_SESSION['client_id'];
    $hasResults = false;

    $filter = $_POST['filter'] ?? null;

        switch ($filter) {
            case 'date_asc':
                $condition = "ORDER BY job_post_id ASC";
                break;
            case 'active':
                $condition = "AND job_status = 'Active' ORDER BY job_post_id DESC";
                break;
            case 'ongiong':
                $condition = "AND job_status = 'Ongoing' ORDER BY job_post_id DESC";
                break;
            case 'inactive':
                $condition = "AND job_status = 'Inactive' ORDER BY job_post_id DESC";
                break;
            default:
                $condition = "ORDER BY job_post_id DESC";
                break;
        }



    $job_offeredQRY = "SELECT * FROM tbl_client_jobpost WHERE client_id = $clientId $condition";

    $job_offeredEXE = mysqli_query($conn, $job_offeredQRY);
    while ($row = mysqli_fetch_assoc($job_offeredEXE)) {
        $hasResults = true;
        $client_id = $row['client_id'];
        $job_post_id = $row['job_post_id'];
        $job_salary_start = $row['salary_start'];
        $job_salary_end = $row['salary_end'];
        $num_applicants = $row['applicants'];
        $yr_Exp = $row['year_exp'];
        $job_loc = $row['location'];
        $job_description = $row['description'];
        $date_posted = $row['start_posted'];
        $date_deadline = $row['deadline'];
        $job_offer = $row['job_offer'];
        $job_status = $row['job_status'];

        $query = "SELECT email FROM tbl_client WHERE client_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $displayEmail= $row['email'];
        }

        $job_offered_companyname_QRY = "SELECT * FROM tbl_company_info WHERE client_id = $client_id";
        $job_offered_companyEXE = mysqli_query($conn, $job_offered_companyname_QRY);

        $company_name = ''; // default fallback

        // Total applied and accepted applicants
        
        $statuses = [
            'Applied' => "SELECT COUNT(*) FROM tbl_applicants WHERE job_post_id = ?",
            'Accepted' => "SELECT COUNT(*) FROM tbl_applicants WHERE job_post_id = ? AND status = 'accepted'",
        ];

        foreach ($statuses as $key => $query) {
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $job_post_id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            ${"Count_Applicants_" . $key} = $count;
        }




        while ($company_row = mysqli_fetch_assoc($job_offered_companyEXE)) {
            $company_name = $company_row['company_name'];
        }

        $colors = [
            '#8B89E9', // soft violet
            '#46CFA6', // teal green
            '#FFAEC9', // light pink
            '#A8E6CF', // mint green
            '#DCE775', // lime pastel
            '#FFCCBC', // peach
            '#B39DDB', // light purple
            '#80DEEA', // cyan pastel
            '#F48FB1', // rose pink
            '#FFECB3', // light yellow
        ];

        // Fetch skills for current client
        $skill_qry = "SELECT * FROM tbl_client_skills_sets WHERE client_id = $client_id";
        $skill_exe = mysqli_query($conn, $skill_qry);

        $i = 0;
        $skill_tags = '';
        while ($skill_row = mysqli_fetch_assoc($skill_exe)) {
            $skill_name = $skill_row['skills'];
            $color = $colors[$i % count($colors)];
            $skill_tags .= "<span class='skill-tag1' style='background-color: $color;'>{$skill_name}</span> ";
            $i++;

            if ($job_status == "Active") {
                $statuscolor = 'green';
            }
            else if ($job_status == "Ongoing") {
                $statuscolor = 'blue';
            } else {
                $statuscolor = 'red';
            }
?>
            <div class="card-link"
                data-type="job"
                data-clientid="<?php echo $client_id ?>"
                data-jobid="<?php echo $job_post_id ?>"
                data-jobStatus="<?php echo htmlspecialchars($job_status) ?>"
                data-companyname="<?php echo htmlspecialchars($company_name) ?>"
                data-location="<?php echo htmlspecialchars($job_loc) ?>"
                data-job-status="<?php echo htmlspecialchars($job_status) ?>"
                data-applied="<?php echo htmlspecialchars($num_applicants) ?>"
                data-AcceptedApplicant="<?php echo $Count_Applicants_Accepted ?>"
                data-salary="<?php echo 'Php ' . $job_salary_start . ' - ' .'Php ' . $job_salary_end ?>"
                data-email="<?php echo htmlspecialchars($displayEmail) ?>"
                data-dates="<?php echo $date_posted . ' - ' . $date_deadline ?>"
                data-description="<?php echo htmlspecialchars($job_description) ?>"
                data-skills="<?php echo htmlspecialchars($skill_tags) ?>"
                data-yoe="<?php echo $yr_Exp ?>"
                onclick="handleCardClick(event)">



                <div class="card" id="my-offer">
                    <div class="job-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="./scriptsfordb/client_image.php?client_id=<?php echo $client_id; ?>" alt="Client Image">
                            </div>
                            <div class="details">
                                <h3><?php echo $company_name ?></h3>
                                <p><?php echo " • " . "<strong>Php:</strong> " . $job_salary_start . " - " . $job_salary_end . " " . "•" .  "   " . "<strong>Applicants Need: </strong> " . $num_applicants . " " . " • <span style='color:" . $statuscolor . " ;'>" . $job_status ?></span></p>
                            </div>
                        </div>
                        <div class="job-dates">
                            <div class="menu-container" onclick="event.stopPropagation(); toggleDropdown(this)">
                                <div class="menu">•••</div>
                                <div class="dropdown">
                                    <a href="#" onclick="editItem(event,'<?php echo $job_post_id ?>')">Edit</a>
                                    <a href="#" onclick="deleteItem(event, '<?php echo $job_post_id ?>')">Delete</a>
                                </div>
                            </div>
                            <p><?php echo $date_posted . " - " . $date_deadline ?></p>

                        </div>
                    </div>
                    <div class="job-body">
                        <div class="info">
                            <p>
                                <strong>Location:</strong>
                                <?php echo $job_loc ?>
                            </p>
                            <p>
                                <strong>Years of experience: </strong> <?php echo $yr_Exp ?>
                            </p>
                        </div>
                        <div class="skills">
                            <p><strong>Skills needed:</strong></p>
                            <span class="skill-tag"><?php echo $skill_tags; ?></span>
                        </div>
                    </div>
                    <!-- Trigger Button -->
                    <div class="job-footer">
                        <button class="applied" onclick="openModal(event)" data-jobid="<?php echo $job_post_id ?>">
                            <?php echo $Count_Applicants_Applied ?> Applied
                        </button>


                        <p><?php echo $Count_Applicants_Accepted ?> Accepted</p>
                    </div>

                </div>
            </div>
            <br>

<?php

        }        
    }
    if (!$hasResults) {
        echo "<div class='no-job-message text-center p-6'><strong>No job post found.</strong></div>";
    }
} ?>
<?php include '../ClientPortal/template/editJobpostModal.php'; ?>
<?php include '../ClientPortal/template/ApplicantViewModal.php'; ?>