<?php
include '../db_con/db_connection.php';

// Enhanced JOIN query with company info
$reported_jobs_QRY = "SELECT 
                    r.report_id,
                    r.user_reported,
                    r.violation,
                    r.description AS report_description,
                    r.fileName,
                    r.filePath,
                    r.date AS report_date,
                    w.client_id,
                    w.job_post_id,
                    w.salary_start,
                    w.salary_end,
                    w.applicants,
                    w.year_exp,
                    w.location,
                    w.description AS job_description,
                    w.deadline,
                    w.job_offer,
                    w.job_status,
                    w.start_posted,
                    c.company_name
                FROM tbl_report_records AS r
                JOIN tbl_client_jobpost AS w ON r.user_reported = w.client_id AND r.job_post_id = w.job_post_id
                LEFT JOIN tbl_company_info AS c ON w.client_id = c.client_id
                WHERE r.job_post_id != 0 
                ORDER BY r.date DESC";

$reported_jobs = mysqli_query($conn, $reported_jobs_QRY);
$hasResults = mysqli_num_rows($reported_jobs) > 0;

if ($hasResults) {
    while ($row = mysqli_fetch_assoc($reported_jobs)) {
        // Basic job info
        $client_id = $row['client_id'];
        $job_salary_start = $row['salary_start'];
        $job_salary_end = $row['salary_end'];
        $job_status = $row['job_status'];
        $job_loc = $row['location'];
        $job_desc = $row['job_description'];
        $yr_Exp = $row['year_exp'];
        $date_posted = $row['start_posted'];
        $job_offer = $row['job_offer'];
        $company_name = $row['company_name'];

        // Report details
        $violation_json = $row['violation'];
        $report_desc = $row['report_description'];
        $report_date = $row['report_date'];

        // Calculate days since reporting
        $posted_date = new DateTime($report_date);
        $now = new DateTime();
        $days_passed = $posted_date->diff($now)->days;

        // Get skills
        $skill_tags = '';
        $colors = ['#8B89E9', '#46CFA6', '#FFAEC9', '#A8E6CF', '#DCE775', '#FFCCBC', '#B39DDB', '#80DEEA', '#F48FB1', '#FFECB3'];
        $skills_qry = mysqli_query($conn, "SELECT skills FROM tbl_client_skills_sets WHERE client_id = $client_id");
        $i = 0;
        while ($skill_row = mysqli_fetch_assoc($skills_qry)) {
            $color = $colors[$i % count($colors)];
            $skill_tags .= "<span class='skill-color' style='background-color: $color;'>{$skill_row['skills']}</span> ";
            $i++;
        }

        // Process violations
        $violations = json_decode($violation_json, true);
        if (!is_array($violations)) $violations = [$violation_json];
        $violation_text = implode(", ", $violations);
?>

        <div class="post-card"
            data-company="<?php echo strtolower($company_name); ?>"
            data-job="<?php echo strtolower($job_offer); ?>"
            data-violation="<?php echo strtolower($violation_text); ?>"
            data-date="<?php echo $report_date; ?>"
            data-salary="<?php echo $job_salary_start; ?>">

            <!-- Post content remains the same as before -->
            <div class="post-header">
                <div class="profile-info">
                    <img src="./imgforadmin/logo.png" alt="Profile Image" class="profile-img">
                    <div class="profile-details">
                        <h4><?php echo $company_name ?></h4>
                        <p class="freelance-info">Company</p>
                    </div>
                </div>
                <div class="post-menu">
                    <span class="posted-time" style="color: red;">Reported <?php echo $days_passed ?> days ago</span>
                </div>
            </div>

            <div class="job-details">
                <p><strong>Job Offer:</strong> <br><?php echo $job_offer ?></p>
                <p><strong>Salary:</strong> <br>Php <?php echo number_format($job_salary_start) ?> - Php <?php echo number_format($job_salary_end) ?></p>
                <p><strong>Location:</strong> <br><?php echo $job_loc ?></p>
                <p><strong>Experience:</strong> <br><?php echo $yr_Exp ?>+ years</p>
            </div>

            <div class="qualifications">
                <p><strong>Skills:</strong><br><?php echo $skill_tags; ?></p>
            </div>

            <div class="responsibilities">
                <p><strong>Responsibilities:</strong></p>
                <ul>
                    <?php
                    $responsibilities = explode("\n", $job_desc);
                    foreach ($responsibilities as $responsibility) {
                        if (trim($responsibility) != '') {
                            echo '<li>' . htmlspecialchars(trim($responsibility)) . '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="violations">
                <p><strong>Reported Violations:</strong></p>
                <ul>
                    <?php foreach ($violations as $violation): ?>
                        <li><?php echo htmlspecialchars($violation); ?></li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Reason:</strong> <?php echo htmlspecialchars($report_desc); ?></p>
            </div>

            <div class="report-sign">
                This post has not been published due to rule violations!
            </div>
        </div>

<?php
    }
} else {
    echo '<div class="no-results" style="display:block;">No reported posts found.</div>';
}
?>