<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db_con/db_connection.php';

$username = $_GET['username'] ?? '';
$username = trim($username);

// Basic validation
if ($username === '') {
    echo json_encode([]);
    exit;
}

$sql = "
    SELECT * FROM (
        SELECT worker_id AS user_id, username, email, 'worker' AS user_type FROM tbl_blue_collar_worker 
        WHERE username LIKE ?
        UNION
        SELECT client_id AS user_id, username, email, 'client' AS user_type FROM tbl_client 
        WHERE username LIKE ?
    ) AS combined_results
    ORDER BY username ASC LIMIT 5
";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    // Handle prepare error
    echo json_encode([]);
    exit;
}

$search = "%$username%";
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);

?>


