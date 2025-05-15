<?php
header('Content-Type: application/json');

// Check if required data exists
if (!isset($_POST['description']) || !isset($_POST['reasons'])) {
    echo json_encode(['success' => false, 'message' => 'Missing fields']);
    exit;
}

$description = trim($_POST['description']);
$reasons = json_decode($_POST['reasons'], true);
$uploadDir = '../uploads/reports/';
$responseFiles = [];

// Create upload directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle file uploads
if (!empty($_FILES['files'])) {
    foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
        if ($_FILES['files']['error'][$index] === UPLOAD_ERR_OK) {
            $originalName = basename($_FILES['files']['name'][$index]);
            $uniqueName = uniqid() . '_' . $originalName;
            $targetPath = $uploadDir . $uniqueName;

            if (move_uploaded_file($tmpName, $targetPath)) {
                $responseFiles[] = $uniqueName;
            }
        }
    }
}

// You could insert the report into a database here if needed.
// For now, just simulate saving and respond with success.

echo json_encode([
    'success' => true,
    'message' => 'Report submitted successfully.',
    'uploaded_files' => $responseFiles,
    'description' => $description,
    'reasons' => $reasons
]);
exit;
