<?php
session_start();
header('Content-Type: application/json');

include '../db_con/db_connection.php';

$sender_id = $_SESSION['worker_id'] ?? $_SESSION['client_id'] ?? null;
if (!$sender_id) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$receiver_id = isset($_POST['receiver_id']) ? intval($_POST['receiver_id']) : 0;
$message = trim($_POST['message'] ?? '');

if (!$receiver_id || empty($message)) {
    echo json_encode(['status' => 'error', 'message' => 'Receiver and message required']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO tbl_messages (sender_id, receiver_id, message, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("iis", $sender_id, $receiver_id, $message);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Message sent']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
}

$stmt->close();
$conn->close();
?>
