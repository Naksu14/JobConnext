<?php
session_start();
include '../db_con/db_connection.php';

if (!isset($_SESSION['Admin_id'])) {
    http_response_code(403);
    exit('Access denied');
}

$adminId = $_SESSION['Admin_id'];

$sql = "SELECT profile_image FROM tbl_admin_information WHERE Admin_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $adminId);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $imageData = $row['profile_image'];
    if ($imageData) {
        header("Content-Type: image/jpeg"); // or image/png depending on image type
        echo $imageData;
        exit();
    }
}

// If no profile image found, use default image
header("Content-Type: image/png");
readfile("imgforadmin/adminProfile.png");
exit();
?>
