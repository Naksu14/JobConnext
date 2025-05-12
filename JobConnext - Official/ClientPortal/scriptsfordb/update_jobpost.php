<?php
include '../../db_con/db_connection.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$description = $data['description'];
$job = $data['job'];
$salaryStart = $data['salaryStart'];
$salaryEnd = $data['salaryEnd'];
$location = $data['location'];
$applicantCount = $data['applicantCount'];
$yearExp = $data['yearExp'];
$deadline = $data['deadline'];
//$client_file = $data['client_file'];

// // ✅ Handle file upload (MIME + extension check)
// if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
//     $allowedMimeTypes = [
//         'application/pdf',
//         'image/jpeg',
//         'image/png'
//     ];
//     $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
//     $maxSize = 15 * 1024 * 1024; // 5MB

//     $fileTmp = $_FILES['fileUpload']['tmp_name'];
//     $originalName = basename($_FILES['fileUpload']['name']);
//     $fileSize = $_FILES['fileUpload']['size'];
//     $fileMime = mime_content_type($fileTmp);
//     $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

//     // Debug log (remove or comment out in production)
//     error_log("Uploaded MIME: $fileMime, Extension: $fileExt");

//     if (!in_array($fileMime, $allowedMimeTypes) || !in_array($fileExt, $allowedExtensions)) {
//         echo json_encode([
//             'success' => false,
//             'message' => "Invalid file type or extension: $fileMime (.$fileExt)"
//         ]);
//         exit;
//     }

//     if ($fileSize > $maxSize) {
//         echo json_encode(['success' => false, 'message' => 'File too large. Max size is 5MB']);
//         exit;
//     }

//     $uniqueName = uniqid('upload_', true) . '.' . $fileExt;
//     $uploadDir = '../../uploads/';
//     $destination = $uploadDir . $uniqueName;

//     if (!move_uploaded_file($fileTmp, $destination)) {
//         echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file']);
//         exit;
//     }

//     $client_file = $uniqueName;
// }

$sql = "UPDATE tbl_client_jobpost SET
            description = ?,
            job_offer = ?,
            salary_start = ?,
            salary_end = ?,
            location = ?,
            applicants = ?,
            year_exp = ?,
            deadline = ?

        WHERE job_post_id = ?";
            //client_file = ?
$stmt = $conn->prepare($sql);
$success = $stmt->execute([
    $description,
    $job,
    $salaryStart,
    $salaryEnd,
    $location,
    $applicantCount,
    $yearExp,
    $deadline,
    //$client_file,
    $id
]);

if ($success) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database update failed.']);
}
