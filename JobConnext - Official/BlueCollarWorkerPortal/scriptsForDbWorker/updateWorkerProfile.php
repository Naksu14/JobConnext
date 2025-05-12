<?php
session_start();

$servername = "127.0.0.1"; 
$username = "root";       
$password = "";             
$dbname = "job_connext";  

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

if (!isset($_SESSION['worker_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$worker_id = $_SESSION['worker_id'];
$data = json_decode(file_get_contents('php://input'), true);

$phone = $data['phone'] ?? '';
$workerAddress = $data['workerAddress'] ?? '';
$workerAbout = $data['about'] ?? '';
$nationality = $data['nationality'] ?? '';
$civilStatus = $data['civilStatus'] ?? '';

try {
    // Update tbl_worker_information
    $stmt1 = $conn->prepare("UPDATE tbl_worker_information SET phone_no = ?, workerAddress = ?, workerAbout = ?, nationality = ?, civilStatus = ? WHERE worker_id = ?");
    $stmt1->bind_param("sssssi", $phone, $address, $workerAbout, $nationality, $civilStatus, $worker_id);
    $stmt1->execute();
    $stmt1->close();


    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
