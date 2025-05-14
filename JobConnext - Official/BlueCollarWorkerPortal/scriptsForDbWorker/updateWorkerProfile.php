<?php
session_start();

$servername = "127.0.0.1"; 
$username = "root";       
$password = "";             
$dbname = "job_connext";  

$conn = new mysqli($servername, $username, $password, $dbname);
header('Content-Type: application/json');

// Database connection error
if ($conn->connect_error) {
    http_response_code(500); // signal server error
    echo json_encode(['success' => false, 'message' => 'DB connection failed']);
    exit;
}

// Not logged in
if (!isset($_SESSION['worker_id'])) {
    http_response_code(401); // unauthorized
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$worker_id = $_SESSION['worker_id'];
$data = json_decode(file_get_contents('php://input'), true);

$phone = $data['phone'] ?? '';
$address = $data['address'] ?? '';
$workerAbout = $data['about'] ?? '';
$nationality = $data['nationality'] ?? '';
$civilStatus = $data['civilStatus'] ?? '';
$birthDate = $data['birthDate'] ?? null;

try {
    $stmt1 = $conn->prepare("UPDATE tbl_worker_information SET phone_no = ?, address = ?, workerAbout = ?, nationality = ?, civilStatus = ?, birthDate = ? WHERE worker_id = ?");
    $stmt1->bind_param("ssssssi", $phone, $address, $workerAbout, $nationality, $civilStatus, $birthDate, $worker_id);
    $stmt1->execute();
    $stmt1->close();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500); // internal server error
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

error_log("Received birthWorker: " . $birthDate);
