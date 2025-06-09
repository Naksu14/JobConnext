<?php
include '../db_con/db_connection.php';

// Single JOIN query to get all needed data
$job_offeredQRY = "SELECT 
    j.*, 
    c.company_name 
FROM 
    tbl_client_jobpost_archive j
JOIN 
    tbl_company_info c ON j.client_id = c.client_id
ORDER BY 
    j.start_posted DESC";

$job_offeredEXE = mysqli_query($conn, $job_offeredQRY);

// Check if there are any results
$hasResults = mysqli_num_rows($job_offeredEXE) > 0;

if ($hasResults) {
    while ($row = mysqli_fetch_assoc($job_offeredEXE)) {
        $client_id = $row['client_id'];
        $job_post_id = $row['job_post_id'];
        $job_salary_start = $row['salary_start'];
        $job_salary_end = $row['salary_end'];
        $num_applicants = $row['applicants'];
        $yr_Exp = $row['year_exp'];
        $job_loc = $row['location'];
        $job_description = $row['description'];
        $date_deadline = $row['deadline'];
        $job_offer = $row['job_offer'];
        $job_status = $row['job_status'];
        $company_name = $row['company_name']; // Now available directly from the JOIN

        $date_posted = $row['start_posted'];
        $now = new DateTime(); // Current date and time
        $posted_date = new DateTime($date_posted);

        $interval = $posted_date->diff($now);
        $days_passed = $interval->days;

        // No need for separate company query anymore

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
            $skill_tags .= "<span class='skill-color' style='background-color: $color;'>{$skill_name}</span> ";
            $i++;

            if ($job_status == "Active") {
                $statuscolor = 'green';
            } else {
                $statuscolor = 'red';
            }}
?>

            <div class="post-card" data-company="<?php echo strtolower($company_name); ?>" data-job="<?php echo strtolower($job_offer); ?>" data-date="<?php echo $date_posted; ?>" data-salary="<?php echo $job_salary_start; ?>">
                <!-- Upper Section: Profile and Menu -->
                <div class="post-header">
                    <div class="profile-info">
                        <img src="./imgforadmin/logo.png" alt="Profile Image" class="profile-img">
                        <div class="profile-details">
                            <h4><?php echo $company_name ?></h4>
                            <p class="freelance-info">Company</p>
                        </div>
                    </div>
                    <div class="post-menu">
                        <span class="posted-time" style="color: red;"><?php echo $days_passed ?> days ago</span>
                    </div>
                </div>

                <!-- Middle Section: Job Details -->
                <div class="job-details">
                    <p><strong>Job Offer:</strong> <br><?php echo $job_offer ?></p>
                    <p><strong>Salary:</strong> <br><?php echo 'Php ' . number_format($job_salary_start) . ' - Php ' . number_format($job_salary_end) ?></p>
                    <p><strong>Location:</strong> <br><?php echo $job_loc ?></p>
                    <p><strong>Experience:</strong> <br><?php echo $yr_Exp ?>+ years</p>
                </div>

                <!-- Qualification and Skills -->
                <div class="qualifications">
                    <p><strong>Skills:</strong><br><span class="skill-color"><?php echo $skill_tags; ?></span></p>
                </div>

                <br>
            </div>

<?php
        
    }
} else {
    echo '<div class="no-results" style="display:block;">No archived posts found.</div>';
}
?>