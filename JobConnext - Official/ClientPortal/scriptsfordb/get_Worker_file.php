<?php
include '../../db_con/db_connection.php';

$worker_id = $_GET['worker_id'] ?? null;

if (!$worker_id) {
    die("Invalid request.");
}

// Query to get the resume file for the worker
$stmt = $conn->prepare("SELECT filename, folder_path FROM tbl_worker_resume WHERE worker_id = ?");
$stmt->bind_param("i", $worker_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $filename = $row['filename'];
    $folder = rtrim($row['folder_path'], '/') . '/'; // Ensure trailing slash
    $filepath = realpath("../../" . $folder . $filename); // Convert to absolute path

    if (!$filepath || !file_exists($filepath)) {
        die("File not found at: " . "../../" . $folder . $filename);
    }

    // Force download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=\"" . basename($filepath) . "\"");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    exit;
} else {
    die("No resume found for this worker.");
}
?>
