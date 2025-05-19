<?php
include '../db_con/db_connection.php';

$worker_reportedQRY = "
    SELECT 
        r.report_id,
        r.user_reported,
        r.violation,
        r.description,
        r.fileName,
        r.filePath,
        r.date,
        w.firstname,
        w.middlename,
        w.lastname
    FROM tbl_report_records AS r
    JOIN tbl_worker_information AS w ON r.user_reported = w.worker_id
    WHERE r.job_post_id = 0
";

$worker_report = mysqli_query($conn, $worker_reportedQRY);

while ($row = mysqli_fetch_assoc($worker_report)) {
    $fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
    $violations = json_decode($row['violation'], true);
    $description = $row['description'];
    $fileName = $row['fileName'];
    $filePath = $row['filePath'];
    $date = $row['date'];

    // Calculate days since report
    $now = new DateTime();
    $posted_date = new DateTime($date);
    $days_passed = $posted_date->diff($now)->days;

?>
    <div class="post-card">
        <div class="post-header">
            <div class="profile-info">
                <img src="./imgforadmin/adminprofile.png" alt="Profile Image" class="profile-img">
                <div class="profile-details">
                    <h4><?= htmlspecialchars($fullname) ?></h4>
                    <p class="freelance-info">Freelance</p>
                </div>
            </div>
            <div class="post-menu">
                <span class="reported-time">Reported <?= $days_passed ?> day<?= $days_passed != 1 ? 's' : '' ?> ago</span>
                <button class="btn btn-menu">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
            </div>
        </div>
        <!-- Reported reason section -->
        <div class="reported-reason">
            
            <span class="reason-text"><strong>Reported Reason:</strong><?php
                                        if (is_array($violations)) {
                                            echo "<ul class='violation-list'>";
                                            foreach ($violations as $violation) {
                                                echo "<li>" . htmlspecialchars($violation) . "</li>";
                                            }
                                            echo "</ul>";
                                        } else {
                                            echo "<p>No violations listed or format invalid.</p>";
                                        } ?></span>

            <p class="reason-description"><?= nl2br(htmlspecialchars($description)) ?></p>
        </div><br>

        <?php if (!empty($fileName) && !empty($filePath)) : ?>
            <div class="report-attachment">
                <a href="../<?= htmlspecialchars($filePath."/".$fileName) ?>" target="_blank" style="text-decoration: none;">View Attachment File</a>
            </div>
        <?php endif; ?>
    </div>
<?php

}
?>