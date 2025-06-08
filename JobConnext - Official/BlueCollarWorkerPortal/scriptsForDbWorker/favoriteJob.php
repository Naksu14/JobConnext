<?php
session_start();
include '../../db_con/db_connection.php';

$conn = new mysqli("localhost", "your_username", "your_password", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$data = json_decode(file_get_contents("php://input"), true);
file_put_contents('debug.log', print_r($data, true));


if (!isset($_SESSION['worker_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$worker_id = $_SESSION['worker_id'];
$data = json_decode(file_get_contents("php://input"), true);

$job_post_id = $data['job_post_id'] ?? null;

if (!$job_post_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid job post ID']);
    exit;
}

// Check if it's already favorited
$checkSQL = "SELECT * FROM tbl_favorite_jobs WHERE worker_id = ? AND job_post_id = ?";
$stmt = $conn->prepare($checkSQL);
$stmt->bind_param("ii", $worker_id, $job_post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Already favorited, remove it
    $deleteSQL = "DELETE FROM tbl_favorite_jobs WHERE worker_id = ? AND job_post_id = ?";
    $stmt = $conn->prepare($deleteSQL);
    $stmt->bind_param("ii", $worker_id, $job_post_id);
    $stmt->execute();
    echo json_encode(['status' => 'unfavorited']);
} else {
    // Not favorited yet, insert
    $insertSQL = "INSERT INTO tbl_favorite_jobs (worker_id, job_post_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("ii", $worker_id, $job_post_id);
    $stmt->execute();
    echo json_encode(['status' => 'favorited']);
}
?>
