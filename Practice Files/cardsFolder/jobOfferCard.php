<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "job_connext"; // Change if different

$conn = new mysqli($servername, $username, $password, $database);

$job_offeredQRY = "SELECT * FROM tbl_client_jobpost";
$job_offeredEXE = mysqli_query($conn, $job_offeredQRY);
while ($row = mysqli_fetch_assoc($job_offeredEXE)) {

    $client_id = $row['client_id'];
    $description = $row['description'];
    $job_offer = $row['job_offer'];
    $location = $row['location'];
    $applicants = $row['applicants'];
    $year_exp = $row['year_exp'];
    $deadline = $row['deadline'];
    $salary_start = $row['salary_start'];
    $salary_end = $row['salary_end'];
    $job_title = $row['job_title'];

    echo '
    <div class="row job-card" style="text-decoration: none !important; margin-bottom: 10px">
        <div class="col-sm-12">
            <div class="card" id="my-offer">
                <a href="client_rate-workers.php" class="card-link">
                    <div class="job-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="../../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                            </div>
                            <div class="details">
                                <h3>' . htmlspecialchars($job_title) . '</h3>
                                <p>Php' . number_format($salary_start) . '₱–' . number_format($salary_end) . '₱ • ' . $applicants . ' Applicants • Active</p>
                            </div>
                        </div>
                        <div class="job-dates">
                            <div class="menu">•••</div>
                            <p>Deadline: ' . htmlspecialchars($deadline) . '</p>
                        </div>
                    </div>
                    <div class="job-body">
                        <div class="info">
                            <p><strong>Location:</strong> ' . htmlspecialchars($location) . '</p>
                            <p><strong>Years of experience:</strong> ' . $year_exp . '</p>
                        </div>
                        <div class="skills">
                            <p><strong>Job Offer:</strong></p>
                            <span class="skill-tag green">' . htmlspecialchars($job_offer) . '</span>
                        </div>
                    </div>
                    <div class="job-footer">
                        <p>' . $applicants . ' Applied</p>
                        <p>0 Accepted</p>
                    </div>
                </a>
            </div>
        </div>
    </div>';
}
?>


