<?php
include "../db_con/db_connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['description']) || !isset($_POST['client_id'])) {
        echo "Missing form data!";
        exit;
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





    if (empty($description)) {
        echo "Description is required.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO tbl_client_jobpost (client_id, description, job_offer, location, applicants, year_exp, deadline, salary_start, salary_end, job_title) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("isssiisiis", $client_id, $description, $job_offer, $location, $applicants, $year_exp , $deadline, $salary_start, $salary_end, $job_title);


    if ($stmt->execute()) {
        echo "New job record created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
}
?>