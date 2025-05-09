<?php
session_start();
include '../../db_con/db_connection.php';

header('Content-Type: application/json');

if (!isset($_SESSION['client_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$clientId = $_SESSION['client_id'];
$data = json_decode(file_get_contents('php://input'), true);

$about = $data['about'] ?? '';
$address = $data['address'] ?? '';
$phone = $data['phone'] ?? '';
$email = $data['email'] ?? '';
$social = $data['social'] ?? ''; // example only

try {
    // Update tbl_company_info
    $stmt1 = $conn->prepare("UPDATE tbl_company_info SET company_aboutUs = ?, company_Address = ? WHERE client_id = ?");
    $stmt1->bind_param("ssi", $about, $address, $clientId);
    $stmt1->execute();
    $stmt1->close();

    // Update tbl_client_information
    $stmt2 = $conn->prepare("UPDATE tbl_client_information SET phone_no = ? WHERE client_id = ?");
    $stmt2->bind_param("si", $phone, $clientId);
    $stmt2->execute();
    $stmt2->close();

    // Update tbl_client
    $stmt3 = $conn->prepare("UPDATE tbl_client SET email = ? WHERE client_id = ?");
    $stmt3->bind_param("si", $email, $clientId);
    $stmt3->execute();
    $stmt3->close();

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
