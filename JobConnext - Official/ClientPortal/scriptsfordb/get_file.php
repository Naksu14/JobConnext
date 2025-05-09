<?php
header('Content-Type: application/json');

// Enable error reporting (optional for development)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Validate GET parameters
if (isset($_GET['client_id']) && isset($_GET['job_id'])) {
    $clientId = intval($_GET['client_id']);
    $jobId = intval($_GET['job_id']);

    // Include your DB connection
    include '../../db_con/db_connection.php';

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT client_file, filepath FROM tbl_client_jobpost WHERE client_id = ? AND job_post_id = ?");
    $stmt->bind_param("ii", $clientId, $jobId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($clientFile, $filepath);
        $stmt->fetch();

        // Return success response
        echo json_encode([
            'success' => true,
            'filepath' => '../' . $filepath . $clientFile  // adjust path for web
        ]);
    } else {
        // No record found
        echo json_encode([
            'success' => false,
            'message' => 'No file found for the given client_id and job_id.'
        ]);
    }

    $stmt->close();
    $conn->close();
} else {
    // Missing parameters
    echo json_encode([
        'success' => false,
        'message' => 'Missing client_id or job_id.'
    ]);
}



// header('Content-Type: application/json');
// echo json_encode([
// 'success' => true,
// 'client_file' => 'upload_681e3f81835bd6.26467672.jpg',
// 'filepath' => '../uploads/upload_681e3f81835bd6.26467672.jpg'
// ]);