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

        // Fetch client email
        $stmt = $conn->prepare("SELECT email FROM tbl_client WHERE client_id = ?");
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
        $result = $stmt->get_result();
        $displayEmail = '';
        if ($res = $result->fetch_assoc()) {
            $displayEmail = $res['email'];
        }
        $stmt->close();

        // Fetch company name
        $company_name = '';
        $company_result = mysqli_query($conn, "SELECT company_name FROM tbl_company_info WHERE client_id = $client_id");
        if ($company_row = mysqli_fetch_assoc($company_result)) {
            $company_name = $company_row['company_name'];
        }

        // Count applicants
        $Count_Applicants_Applied = 0;
        $Count_Applicants_Accepted = 0;

        $stmt = $conn->prepare("SELECT COUNT(*) FROM tbl_applicants WHERE job_post_id = ?");
        $stmt->bind_param("i", $job_post_id);
        $stmt->execute();
        $stmt->bind_result($Count_Applicants_Applied);
        $stmt->fetch();
        $stmt->close();

        $stmt = $conn->prepare("SELECT COUNT(*) FROM tbl_applicants WHERE job_post_id = ? AND status = 'accepted'");
        $stmt->bind_param("i", $job_post_id);
        $stmt->execute();
        $stmt->bind_result($Count_Applicants_Accepted);
        $stmt->fetch();
        $stmt->close();

        // Fetch skill tags
        $colors = ['#8B89E9', '#46CFA6', '#FFAEC9', '#A8E6CF', '#DCE775', '#FFCCBC', '#B39DDB', '#80DEEA', '#F48FB1', '#FFECB3'];
        $skill_tags = '';
        $i = 0;

        $skill_exe = mysqli_query($conn, "SELECT skills FROM tbl_client_skills_sets WHERE client_id = $client_id");
        while ($skill_row = mysqli_fetch_assoc($skill_exe)) {
            $skill_name = htmlspecialchars($skill_row['skills']);
            $color = $colors[$i % count($colors)];
            $skill_tags .= "<span class='skill-tag1' style='background-color: $color;'>{$skill_name}</span> ";
            $i++;
        }

        // Determine status color
        $statuscolor = match ($job_status) {
            'Active' => 'green',
            'Ongoing' => 'blue',
            default => 'red',
        };
?>

        <!-- CARD OUTPUT -->
        <div class="card-link"
            data-type="job"
            data-clientid="<?= $client_id ?>"
            data-jobid="<?= $job_post_id ?>"
            data-jobOffer="<?= htmlspecialchars($job_offer) ?>"
            data-jobStatus="<?= htmlspecialchars($job_status) ?>"
            data-companyname="<?= htmlspecialchars($company_name) ?>"
            data-location="<?= htmlspecialchars($job_loc) ?>"
            data-job-status="<?= htmlspecialchars($job_status) ?>"
            data-applied="<?= htmlspecialchars($num_applicants) ?>"
            data-AcceptedApplicant="<?= $Count_Applicants_Accepted ?>"
            data-salary="Php <?= $job_salary_start ?> - Php <?= $job_salary_end ?>"
            data-email="<?= htmlspecialchars($displayEmail) ?>"
            data-dates="<?= $date_posted ?> - <?= $date_deadline ?>"
            data-description="<?= htmlspecialchars($job_description) ?>"
            data-skills="<?= htmlspecialchars($skill_tags) ?>"
            data-yoe="<?= $yr_Exp ?>"
            onclick="handleCardClick(event)">

            <div class="card" id="my-offer">
                <div class="job-header">
                    <div class="profile-info">
                        <div class="avatar">
                            <img src="./scriptsfordb/client_image.php?client_id=<?= $client_id ?>" alt="Client Image">
                        </div>
                        <div class="details">
                            <h3><?= htmlspecialchars($company_name) ?></h3>
                            <p>• <strong>Php:</strong> <?= $job_salary_start ?> - <?= $job_salary_end ?> •
                                <strong>Applicants Needed:</strong> <?= $num_applicants ?> •
                                <span style="color: <?= $statuscolor ?>;"><?= $job_status ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="job-dates">
                        <div class="menu-container" onclick="event.stopPropagation(); toggleDropdown(this)">
                            <div class="menu">•••</div>
                            <div class="dropdown">
                                <a href="#" onclick="editItem(event, '<?= $job_post_id ?>')">Edit</a>
                                <a href="#" onclick="deleteItem(event, '<?= $job_post_id ?>')">Delete</a>
                            </div>
                        </div>
                        <p><?= $date_posted ?> - <?= $date_deadline ?></p>
                    </div>
                </div>
                <div class="job-body">
                    <div class="info">
                        <p><strong>Job Offer:</strong> <?= htmlspecialchars($job_offer) ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($job_loc) ?></p>
                        <p><strong>Years of experience:</strong> <?= $yr_Exp ?></p>
                    </div>
                    <div class="skills">
                        <p><strong>Skills needed:</strong></p>
                        <span class="skill-tag"><?= $skill_tags ?></span>
                    </div>
                </div>
                <div class="job-footer">
                    <button class="applied" onclick="openModal(event)" data-jobid="<?= $job_post_id ?>">
                        <?= $Count_Applicants_Applied ?> Applied
                    </button>
                    <p><?= $Count_Applicants_Accepted ?> Accepted</p>
                </div>
            </div>
        </div>
        <br>

<?php
    }

    if (!$hasResults) {
        echo "<div class='no-job-message text-center p-6'><strong>No job post found.</strong></div>";
    }
}
?>

<?php include '../ClientPortal/template/editJobpostModal.php'; ?>
<?php include '../ClientPortal/template/ApplicantViewModal.php'; ?>