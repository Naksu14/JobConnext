<?php 
session_start();

// Ensure the admin is logged in
if (!isset($_SESSION['Admin_id'])) {
    die("Access denied");
}

// Include the DB connection
include '../db_con/db_connection.php';

$admin_id = $_SESSION['Admin_id'];

// Collect form values
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];

// Handle profile image upload (check if a file was uploaded)
$profile_image_data = null;
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $profile_image_data = file_get_contents($_FILES['profile_image']['tmp_name']);
}

// === Update tbl_admin_information ===
if ($profile_image_data !== null) {
    $sql = "UPDATE tbl_admin_information SET full_name = ?, phone = ?, address = ?, profile_image = ? WHERE Admin_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $full_name, $phone, $address, $profile_image_data, $admin_id);
} else {
    $sql = "UPDATE tbl_admin_information SET full_name = ?, phone = ?, address = ? WHERE Admin_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $full_name, $phone, $address, $admin_id);
}
$stmt->execute();
$stmt->close();

// === Update email in tbl_admin ===
$sql = "UPDATE tbl_admin SET email = ? WHERE Admin_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $email, $admin_id);
$stmt->execute();
$stmt->close();

// === Update password if provided ===
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE tbl_admin SET hashpassword = ? WHERE Admin_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $admin_id);
    $stmt->execute();
    $stmt->close();
}

// Close DB connection
$conn->close();

// Redirect back with success
header("Location: AdminProfile.php?updated=true");
exit();
?>


