<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_connext";

$conn = new mysqli($servername, $username, $password, $dbname);
header('Content-Type: application/json');

$worker_id = $_SESSION['worker_id'];
$data = json_decode(file_get_contents('php://input'), true);

$phone = $data['phone'] ?? '';
$address = $data['address'] ?? '';
$workerAbout = $data['about'] ?? '';
$nationality = $data['nationality'] ?? '';
$civilStatus = $data['civilStatus'] ?? '';
$birthDate = $data['birthDate'] ?? null;
$softSkills = $data ['softSkills'] ?? '';

try {
    $stmt1 = $conn->prepare("UPDATE tbl_worker_information SET phone_no = ?, address = ?, workerAbout = ?, nationality = ?, civilStatus = ?, birthDate = ?, softSkills = ? WHERE worker_id = ?");
    $stmt1->bind_param("sssssssi", $phone, $address, $workerAbout, $nationality, $civilStatus, $birthDate, $softSkills, $worker_id);
    $stmt1->execute();
    $stmt1->close();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500); // internal server error
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

error_log("Received birthWorker: " . $birthDate);
