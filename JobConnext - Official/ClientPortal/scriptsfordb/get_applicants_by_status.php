<?php
// Include your DB connection
include '../../db_con/db_connection.php';

$job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;
$status = isset($_GET['status']) ? $_GET['status'] : '';

$response = [];

if ($job_id > 0 && in_array($status, ['pending', 'accepted', 'rejected'])) {
    $stmt = $conn->prepare("
        SELECT 
            w.worker_id,
            a.job_post_id,
            CONCAT(w.firstname, ' ', w.lastname) AS name,
            w.softSkills,
            w.profile,
            w.phone_no,
            w.bio,
            w.year_experience,
            CONCAT(w.barangay, ', ', w.city, ', ', w.province) AS location,
            a.comment,
            a.status,
            GROUP_CONCAT(s.skills SEPARATOR ', ') AS hardSkills
        FROM tbl_applicants a
        INNER JOIN tbl_worker_information w ON a.worker_id = w.worker_id
        LEFT JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id
        WHERE a.job_post_id = ? AND a.status = ?
        GROUP BY w.worker_id
    ");

    $stmt->bind_param("is", $job_id, $status);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = [];
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
