<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../../db_con/db_connection.php';

$workerId = $_SESSION['worker_id'];

if (!$workerId) {
    echo json_encode(['success' => false, 'message' => 'Missing worker ID.']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $worker_id = $_POST['worker_id'];
    $jobPostId = $_POST['job_post_id'];
    $hasApplied = false;

    if (!$worker_id || !$jobPostId) {
        echo json_encode(['success' => false, 'message' => 'Missing worker or job post ID.']);
        exit;
    }

    // Check first if the application already exists
    $checkSql = "SELECT * FROM tbl_applicants WHERE worker_id = ? AND job_post_id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ii", $worker_id, $jobPostId);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'You have already applied for this job.']);
        $checkStmt->close();
        $conn->close();
        exit;
    }
    $checkStmt->close();

    // Only insert if not already applied
    $sql = "INSERT INTO tbl_applicants (worker_id, job_post_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $worker_id, $jobPostId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Application submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }


    
    $stmt->close();
    $conn->close();
}
?>
