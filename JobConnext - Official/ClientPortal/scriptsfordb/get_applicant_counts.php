<?php
// Include your DB connection
include '../../db_con/db_connection.php';

$job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;
$response = ['pending' => 0, 'accepted' => 0, 'rejected' => 0];

if ($job_id > 0) {
    $query = "SELECT status, COUNT(*) as count FROM tbl_applicants WHERE job_post_id = ? GROUP BY status";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $status = strtolower($row['status']);
        if (in_array($status, ['pending', 'accepted', 'rejected'])) {
            $response[$status] = (int)$row['count'];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
