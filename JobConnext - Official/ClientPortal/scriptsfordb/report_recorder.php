<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include '../../db_con/db_connection.php';
header('Content-Type: application/json');
session_start();

// Get user ID from session
$user_id = $_SESSION['client_id'] ?? $_SESSION['worker_id'];
if (!$user_id) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Check for required POST fields
if (!isset($_POST['description'], $_POST['reasons'], $_POST['report_id'])) {
    echo json_encode(['success' => false, 'message' => 'Missing fields']);
    exit;
}

$description = trim($_POST['description']);
$_report_id = $_POST['report_id'];
$reasons = json_decode($_POST['reasons'], true);

// Validate $reasons
if (!is_array($reasons)) {
    echo json_encode(['success' => false, 'message' => 'Invalid reasons format']);
    exit;
}

$uploadDir = '../../uploads/reports/';
$responseFiles = [];

// Create upload directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle file uploads
if (isset($_FILES['files'])) {
    $allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png'];
    $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
    $maxSize = 15 * 1024 * 1024; // 15MB

    foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
        if ($_FILES['files']['error'][$index] !== UPLOAD_ERR_OK) {
            continue; // Skip this file
        }

        $originalName = basename($_FILES['files']['name'][$index]);
        $fileSize = $_FILES['files']['size'][$index];
        $fileMime = mime_content_type($tmpName);
        $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        // Validate type and extension
        if (!in_array($fileMime, $allowedMimeTypes) || !in_array($fileExt, $allowedExtensions)) {
            echo json_encode([
                'success' => false,
                'message' => "Invalid file type or extension: $fileMime (.$fileExt)"
            ]);
            exit;
        }

        // Validate file size
        if ($fileSize > $maxSize) {
            echo json_encode(['success' => false, 'message' => 'File too large. Max size is 15MB']);
            exit;
        }

        // Save the file
        $uniqueName = uniqid('upload_', true) . '.' . $fileExt;
        $destination = $uploadDir . $uniqueName;

        if (move_uploaded_file($tmpName, $destination)) {
            $responseFiles[] = $uniqueName;
            $filename = $uniqueName;;
        }
    }
}

// Convert array fields to JSON for storage
$reasonString = json_encode($reasons);

// Insert into the database
$sql = "INSERT INTO tbl_report_records (
    user_id,
    user_reported,
    violation,
    description,
    fileName
) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param(
    'sssss',
    $user_id,
    $_report_id,
    $reasonString,
    $description,
    $filename
);

if (!$stmt->execute()) {
    echo json_encode(['success' => false, 'message' => 'Execute failed: ' . $stmt->error]);
    exit;
}

// Success response
echo json_encode([
    'success' => true,
    'message' => 'Report submitted successfully.',
    'uploaded_files' => $responseFiles,
    'description' => $description,
    'report_id' => $_report_id,
    'reasons' => $reasons
]);
exit;
?>


