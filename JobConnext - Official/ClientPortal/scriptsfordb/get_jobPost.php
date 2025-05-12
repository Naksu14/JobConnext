<?php
include '../../db_con/db_connection.php';

if (isset($_GET['id'])) {
    $jobPostId = $_GET['id'];

    $sql = "SELECT * FROM tbl_client_jobpost WHERE job_post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $jobPostId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $jobPost = $result->fetch_assoc();
            echo json_encode(['success' => true, 'job' => $jobPost]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No job post found']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error executing query']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Missing job post ID']);
}
