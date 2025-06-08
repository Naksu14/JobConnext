<?php
header("Content-Type: image/jpeg");
include '../db_con/db_connection.php';

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';

if (!$type || !$id) {
    readfile('../Assets/image/noProfile.jpg');
    exit;
}

if ($type === 'worker') {
    $stmt = $conn->prepare("SELECT image FROM worker_image WHERE worker_id = ? ORDER BY uploaded_at DESC LIMIT 1");
} elseif ($type === 'client') {
    $stmt = $conn->prepare("SELECT image FROM tbl_client_image WHERE client_id = ? ORDER BY uploaded_at DESC LIMIT 1");
} else {
    readfile('../Assets/image/noProfile.jpg');
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (!empty($row['image'])) {
        echo $row['image'];
        exit;
    }
}

readfile('../Assets/image/noProfile.jpg');
?>
