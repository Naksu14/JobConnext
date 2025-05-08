<?php
include '../db_con/db_connection.php';

$clientId = $_SESSION['client_id'];

$job_offeredQRY = "SELECT * FROM tbl_client_jobpost WHERE client_id != $clientId";
$job_offeredEXE = mysqli_query($conn, $job_offeredQRY);
while ($row = mysqli_fetch_assoc($job_offeredEXE)) {

    $client_id = $row['client_id'];
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

    $job_offered_companyname_QRY = "SELECT * FROM tbl_company_info WHERE client_id = $client_id";
    $job_offered_companyEXE = mysqli_query($conn, $job_offered_companyname_QRY);

    $company_name = ''; // default fallback

    while ($company_row = mysqli_fetch_assoc($job_offered_companyEXE)) {
        $company_name = $company_row['company_name'];
    }

    $colors = ['#D8CBFF', '#FFD8CB', '#CBFFD8', '#CBCDFF', '#FFCBE5', '#E0CBFF']; // Add more if needed

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

        if ($job_status == null) {
            $status =  "Inactive";
            $statuscolor = 'red';
            
        } else {
            $status = "Active";
            $statuscolor = 'green';
        }


?>
        <a href="#" class="card-link"
            data-type="job"
            data-clientid="<?php echo $client_id ?>"
            data-companyname="<?php echo htmlspecialchars($company_name) ?>"
            data-location="<?php echo htmlspecialchars($job_loc) ?>"
            data-salary="<?php echo 'Php ' . $job_salary_start . ' - ' . $job_salary_end ?>"
            data-email="<?php echo htmlspecialchars('EmailCompany@gmail.com') ?>"
            data-dates="<?php echo $date_posted . ' - ' . $date_deadline ?>"
            data-description="<?php echo htmlspecialchars($job_description) ?>"
            data-skills="<?php echo htmlspecialchars($skill_tags) ?>"
            data-yoe="<?php echo $yr_Exp ?>">

            <div class="card" id="my-offer">
                    <div class="job-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="./scriptsfordb/client_image.php?client_id=<?php echo $client_id; ?>" alt="Client Image">
                            </div>
                            <div class="details">
                                <h3><?php echo $company_name ?></h3>
                                <p><?php echo " " . "•" . " " . "<strong>Php:</strong> " . $job_salary_start . " - " . $job_salary_end . " " . "•" .  "   " . "<strong>Applicants Need: </strong> " . $num_applicants ." " . " • <span style='color:".$statuscolor." ;'>" . $status ?></span></p> 
                            </div>
                        </div>
                        <div class="job-dates">
                            <div class="menu">•••</div>
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
                    <div class="job-footer">
                        <button onclick="showAlert()" style="border: none;">
                            <p>5 Applied</p>
                        </button>
                        <p>0 Accepted</p>
                    </div>
                </div>
        </a>
        <br>

<?php

    }
} ?>