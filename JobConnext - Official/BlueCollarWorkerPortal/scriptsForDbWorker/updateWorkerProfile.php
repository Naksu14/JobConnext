<?php
session_start();

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_connext";

$conn = new mysqli($servername, $username, $password, $dbname);

$worker_id = $_SESSION['worker_id'] ?? null;

if (!$worker_id) {
    echo json_encode(['success' => false, 'message' => 'Worker not logged in']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

// Fetch current data first
$currentData = $conn->prepare("SELECT * FROM tbl_worker_information WHERE worker_id = ?");
$currentData->bind_param("i", $worker_id);
$currentData->execute();
$result = $currentData->get_result();
$existing = $result->fetch_assoc();
$currentData->close();

if (!$existing) {
    echo json_encode(['success' => false, 'message' => 'Worker data not found']);
    exit;
}

// Merge new data with existing
$fields = [
    'phone_no' => $data['phone'] ?? $existing['phone_no'],
    'address' => $data['address'] ?? $existing['address'],
    'workerAbout' => $data['about'] ?? $existing['workerAbout'],
    'nationality' => $data['nationality'] ?? $existing['nationality'],
    'civilStatus' => $data['civilStatus'] ?? $existing['civilStatus'],
    'birthDate' => $data['birthDate'] ?? $existing['birthDate'],
    'softSkills' => $data['softSkills'] ?? $existing['softSkills'],
    'certs' => $data['certs'] ?? $existing['certs'],
    'acc' => $data['acc'] ?? $existing['acc'],
];

try {
    $stmt = $conn->prepare("UPDATE tbl_worker_information SET phone_no=?, address=?, workerAbout=?, nationality=?, civilStatus=?, birthDate=?, softSkills=?, certs=?, acc=? WHERE worker_id=?");
    $stmt->bind_param(
        "sssssssssi",
        $fields['phone_no'],
        $fields['address'],
        $fields['workerAbout'],
        $fields['nationality'],
        $fields['civilStatus'],
        $fields['birthDate'],
        $fields['softSkills'],
        $fields['certs'],
        $fields['acc'],
        $worker_id
    );
    $stmt->execute();
    $stmt->close();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

?>