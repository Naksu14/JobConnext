<?php
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db_con/db_connection.php';

$username = trim($_GET['username'] ?? '');

if ($username === '') {
    echo json_encode([]);
    exit;
}

$sql = "
SELECT * FROM (
    SELECT 
        w.worker_id AS user_id,
        w.username,
        w.email,
        'worker' AS user_type
    FROM 
        tbl_blue_collar_worker w
    WHERE 
        w.username LIKE ?
    
    UNION
    
    SELECT 
        c.client_id AS user_id,
        c.username,
        c.email,
        'client' AS user_type
    FROM 
        tbl_client c
    WHERE 
        c.username LIKE ?
) AS combined_results
ORDER BY username ASC
LIMIT 5;
";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode([]);
    exit;
}

$search = "%$username%";
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();

$users = [];
while ($row = $result->fetch_assoc()) {
    // Construct the image URL here
    $image_url = "../message/display_image.php?type=" . urlencode($row['user_type']) . "&id=" . urlencode($row['user_id']);
    
    $row['image_url'] = $image_url;
    $users[] = $row;
}

echo json_encode($users);
?>

