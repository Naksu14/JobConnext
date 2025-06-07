<?php
// scriptsfordb/rate_worker.php
include '../../db_con/db_connection.php';

$worker_id = $_POST['worker_id'];
$job_id = $_POST['job_id'];
$client_id = $_POST['client_id']; // Ensure this is sent from the form or session
$rating = $_POST['rating'];
$feedback = $_POST['feedback'];

// Prepare SQL
$sql = "INSERT INTO tbl_rating (worker_id, job_id, client_id, rating, feedback, created_at)
        VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiis", $worker_id, $job_id, $client_id, $rating, $feedback);

// Execute
if ($stmt->execute()) {
    echo "Rating saved!";
} else {
    echo "Error: " . $stmt->error;
}
?>
