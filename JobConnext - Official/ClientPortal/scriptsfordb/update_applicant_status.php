<?php
include '../../db_con/db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);

$workerId = $data['workerId'] ?? '';
$jobId = $data['jobId'] ?? '';
$status = $data['action'] ?? '';

$response = ['success' => false, 'message' => 'Invalid request'];

if ($workerId && $jobId && in_array($status, ['accepted', 'rejected'])) {
    $stmt = $conn->prepare("UPDATE tbl_applicants SET status = ? WHERE worker_id = ? AND job_post_id = ?");

    if ($stmt === false) {
        $response['message'] = "Prepare failed: " . $conn->error;
    } else {
        $stmt->bind_param("sii", $status, $workerId, $jobId);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Applicant has been $status.";
        } else {
            $response['message'] = "Execute failed: " . $stmt->error;
        }

        $stmt->close();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
