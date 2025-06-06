<?php 
include '../../db_con/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['job_post_id'])) {
    $job_post_id = $_POST['job_post_id'];

    // Insert into archive with correct column list
    $archiveQuery = "
        INSERT INTO tbl_client_jobpost_archive (
            client_id, job_post_id, job_offer, salary_start, salary_end, 
            client_file, filePath, job_status, description, location, 
            applicants, year_exp, start_posted, deadline, archived_at
        )
        SELECT 
            client_id, job_post_id, job_offer, salary_start, salary_end, 
            client_file, filePath, job_status, description, location, 
            applicants, year_exp, start_posted, deadline, CURRENT_TIMESTAMP
        FROM tbl_client_jobpost 
        WHERE job_post_id = ? ";
    // 2. Delete from original
    $deleteQuery = "
        DELETE FROM tbl_client_jobpost
        WHERE job_post_id = ?
    ";

    $stmt1 = $conn->prepare($archiveQuery);
    $stmt1->bind_param('i', $job_post_id);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
        $deleteQuery = "DELETE FROM tbl_client_jobpost WHERE job_post_id = ?";
        $stmt2 = $conn->prepare($deleteQuery);
        $stmt2->bind_param('i', $job_post_id);
        $stmt2->execute();

        echo "Job post archived successfully.";
        $stmt2->close();
    } else {
        echo "Job post not found or already archived.";
    }

    $stmt1->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
