<?php
header('Content-Type: application/json');
include '../../db_con/db_connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$jobId = $data['jobId'] ?? null;
$clientId = $data['clientId'] ?? null;
$status = $data['status'] ?? null;

$response = ['success' => false];

if ($jobId && $clientId && in_array($status, ['Inactive', 'Ongoing'])) {
    $stmt = $conn->prepare("UPDATE tbl_client_jobpost SET job_status = ? WHERE job_post_id = ? AND client_id = ?");
    $stmt->bind_param("sii", $status, $jobId, $clientId);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Job status updated to '$status'.";
    } else {
        $response['message'] = "DB error: " . $stmt->error;
    }

    $stmt->close();
} else {
    $response['message'] = "Invalid input.";
}

echo json_encode($response);
