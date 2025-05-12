<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include your database connection
include '../../db_con/db_connection.php';

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
session_start();

// Convert all errors/warnings into JSON
set_error_handler(function ($severity, $message, $file, $line) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => "PHP Error: $message in $file on line $line"
    ]);
    exit;
});

set_exception_handler(function ($e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => "Exception: " . $e->getMessage()
    ]);
    exit;
});

// ✅ Check session
if (!isset($_SESSION['client_id'])) {
    echo json_encode(['success' => false, 'message' => 'User session not found']);
    exit;
}
$user_id = $_SESSION['client_id'];

// ✅ Get POST data
$description    = $_POST['description'] ?? '';
$jobSelect      = ($_POST['jobSelect'] == 'others') ? $_POST['otherJob'] : $_POST['jobSelect'];
$salaryStart    = $_POST['salaryRange_start'] ?? '';
$salaryEnd      = $_POST['salaryRange_end'] ?? '';
$location       = $_POST['location'] ?? '';
$applicantCount = $_POST['applicant_count'] ?? '';
$yearExperience = $_POST['year_experience'] ?? '';
$date           = $_POST['date'] ?? '';
$filename       = null;
$job_status = 'Active';

// ✅ Handle file upload (MIME + extension check)
if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
    $allowedMimeTypes = [
        'application/pdf',
        'image/jpeg',
        'image/png'
    ];
    $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
    $maxSize = 15 * 1024 * 1024; // 5MB

    $fileTmp = $_FILES['fileUpload']['tmp_name'];
    $originalName = basename($_FILES['fileUpload']['name']);
    $fileSize = $_FILES['fileUpload']['size'];
    $fileMime = mime_content_type($fileTmp);
    $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    // Debug log (remove or comment out in production)
    error_log("Uploaded MIME: $fileMime, Extension: $fileExt");

    if (!in_array($fileMime, $allowedMimeTypes) || !in_array($fileExt, $allowedExtensions)) {
        echo json_encode([
            'success' => false,
            'message' => "Invalid file type or extension: $fileMime (.$fileExt)"
        ]);
        exit;
    }

    if ($fileSize > $maxSize) {
        echo json_encode(['success' => false, 'message' => 'File too large. Max size is 5MB']);
        exit;
    }

    $uniqueName = uniqid('upload_', true) . '.' . $fileExt;
    $uploadDir = '../../uploads/';
    $destination = $uploadDir . $uniqueName;

    if (!move_uploaded_file($fileTmp, $destination)) {
        echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file']);
        exit;
    }

    $filename = $uniqueName;
}

// ✅ Insert job post into database
$sql = "INSERT INTO tbl_client_jobpost (
    client_id,
    job_offer,
    salary_start,
    salary_end,
    client_file,
    job_status,
    description,
    location,
    applicants,
    year_exp,
    deadline
) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param(
    'isddsssssss',
    $user_id,
    $jobSelect,
    $salaryStart,
    $salaryEnd,
    $filename,
    $job_status,
    $description,
    $location,
    $applicantCount,
    $yearExperience,
    $date
);

if (!$stmt->execute()) {
    echo json_encode(['success' => false, 'message' => 'Execute failed: ' . $stmt->error]);
    exit;
}

$stmt->close();

// ✅ Success response
echo json_encode([
    'success' => true,
    'message' => 'Job post submitted successfully',
    'data' => [
        'description' => $description,
        'jobSelect' => $jobSelect,
        'salaryStart' => $salaryStart,
        'salaryEnd' => $salaryEnd,
        'location' => $location,
        'applicantCount' => $applicantCount,
        'yearExperience' => $yearExperience,
        'date' => $date,
        'file' => $filename
    ]
]);
exit;

