<?php
include "../db_con/db_connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['description']) || !isset($_POST['client_id'])) {
        echo "Missing form data!";
        exit;
    }

    $upload_dir = "../uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Ensure upload directory exists
    }

    $client_id = trim($_POST['client_id']);
    $description = trim($_POST['description']);
    $job_offer = trim($_POST['job_offer']);
    $location = trim($_POST['location']);
    $applicants = trim($_POST['applicants']);
    $year_exp = trim($_POST['year_exp']);
    $deadline = trim($_POST['deadline']);
    $salary_start = trim($_POST['salary_start']);
    $salary_end = trim($_POST['salary_end']);
    $job_title = trim($_POST['job_title']);

    // File handling
    $file_paths = [];
    if (!empty($_FILES['file_upload']['name'][0])) { // Ensure files are uploaded
        $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];

        foreach ($_FILES['file_upload']['name'] as $index => $file_name) {
            $file_tmp = $_FILES['file_upload']['tmp_name'][$index];
            $file_type = $_FILES['file_upload']['type'][$index];

            if (!in_array($file_type, $allowed_types)) {
                echo "Invalid file type!";
                exit;
            }

            $target_path = $upload_dir . basename($file_name);
            if (move_uploaded_file($file_tmp, $target_path)) {
                $file_paths[] = $target_path;
            } else {
                echo "File upload failed!";
                exit;
            }
        }
    }

    $fileInput = implode(',', $file_paths); // Store as comma-separated list

    $stmt = $conn->prepare("INSERT INTO tbl_client_jobpost (client_id, description, job_offer, location, applicants, year_exp, deadline, salary_start, salary_end, job_title, fileInput) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("isssiisiiss", $client_id, $description, $job_offer, $location, $applicants, $year_exp, $deadline, $salary_start, $salary_end, $job_title, $fileInput);

    if ($stmt->execute()) {
        echo "New job record created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
