<?php
include '../../db_con/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['job_post_id'])) {
    $job_post_id = $_POST['job_post_id'];

    // 1. Insert into archive
    $archiveQuery = "
        INSERT INTO tbl_client_jobpost_archive
        SELECT *, CURRENT_TIMESTAMP FROM tbl_client_jobpost
        WHERE job_post_id = ?
    ";

    // 2. Delete from original
    $deleteQuery = "
        DELETE FROM tbl_client_jobpost
        WHERE job_post_id = ?
    ";

    $stmt1 = $conn->prepare($archiveQuery);
    $stmt1->bind_param('s', $job_post_id);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
        $stmt2 = $conn->prepare($deleteQuery);
        $stmt2->bind_param('s', $job_post_id);
        $stmt2->execute();

        echo "Job post archived successfully.";  // Success message
    } else {
        echo "Job post not found or already archived.";  // Failure message
    }

    $stmt1->close();
    $stmt2->close();
    $conn->close();
} else {
    echo "Invalid request.";  // Error message
}
?>
