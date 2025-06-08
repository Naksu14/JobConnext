<?php
include '../db_con/db_connection.php';

$job_offeredQRY = "SELECT * FROM tbl_client_jobpost ORDER BY start_posted DESC";
$job_offeredEXE = mysqli_query($conn, $job_offeredQRY);
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


    $date_posted = $row['start_posted'];
    $now = new DateTime(); // Current date and time
    $posted_date = new DateTime($date_posted);

    $interval = $posted_date->diff($now);
    $days_passed = $interval->days;

    $job_offered_companyname_QRY = "SELECT * FROM tbl_company_info WHERE client_id = $client_id";
    $job_offered_companyEXE = mysqli_query($conn, $job_offered_companyname_QRY);

    $company_name = ''; // default fallback

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
        $skill_tags .= "<span class='skill-color' style='background-color: $color;'>{$skill_name}</span> ";
        $i++;

        if ($job_status == "Active") {
            $statuscolor = 'green';
        } else {
            $statuscolor = 'red';
        }
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
                <p><strong>Job Offer:</strong><br><?php echo $job_offer ?></p>
                <p><strong>Salary:</strong> <br><?php echo 'Php ' . $job_salary_start . ' - Php ' . $job_salary_end ?></p>
                <p><strong>Location:</strong> <br><?php echo $job_loc ?></p>
                <p><strong>Experience:</strong> <br><?php echo $yr_Exp ?>+ years</p>
            </div>


            <!-- Qualification and Skills -->
            <div class="qualifications">
                <p><strong>Skills:</strong><br><span class="skill-color"><?php echo $skill_tags; ?></span></p>
            </div>

            <!-- Responsibilities -->
            <div class="responsibilities">
                <p><strong>Responsibilities:</strong></p>
                <ul>
                    <li>Design and develop blockchain solutions</li>
                    <li>Ensure the security of decentralized applications</li>
                    <li>Collaborate with cross-functional teams</li>
                </ul>
            </div>
            <br>

            <!-- Comments and Rating -->
            <div class="comments-rating">
                <p><strong>Comments:</strong></p>

                <div class="comment-card">
                    <div class="comment-content">
                        <div class="profile-info">
                            <img src="./imgforadmin/adminprofile.png" class="profile-img">
                            <div class="profile-details">
                                <h4>Rhanel Buclares</h4>
                                <p class="freelance-info">Freelance</p>
                            </div>
                        </div>
                        <div class="post-menu">
                            <span class="posted-time">5 mins ago</span>
                            <button class="btn btn-menu">
                                <i class="bi bi-three-dots"></i>
                            </button>
                        </div>

                    </div>
                    <div class="comments">
                        <div class="rating">
                            <span><b>Rate:</b></span>
                            <button class="btn btn-rate">⭐⭐⭐⭐⭐</button>
                        </div>
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>



            </div><br>

            <!-- Violation Section for Admin User -->
            <div class="violation-section">
                <p><strong>Report Violation:</strong></p>
                <div class="violation-sign">
                    <p>If you find any issue, kindly review the suggested violation reasons below. You can either choose one or add more details.</p>
                </div>
                <!-- <select class="violation-type" aria-label="Select Suggested Violation Type">
                            <option value="" disabled selected>Select violation type...</option>
                            <option value="spam">Spam</option>
                            <option value="harassment">Harassment</option>
                            <option value="inappropriate_content">Inappropriate Content</option>
                            <option value="false_information">False Information</option>
                            <option value="other">Other</option>
                        </select> -->
                <!-- <textarea
                            class="violation-comment"
                            rows="4"
                            placeholder="Add additional comments or details (optional)..."></textarea> -->
                <div class="admin-action">
                    <button class="btn btn-approve">Report Post</button>
                </div>
            </div>


        </div>

<?php
    }
}
?>
