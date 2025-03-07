<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include '../db_con/db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"] ?? '';
    $email = $_POST["Email"] ?? '';
    $password = $_POST["password"] ?? '';

    // Validate input (Basic validation)
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO tbl_blue_collar_worker (username, email, hash_password) VALUES (?, ?, ?)");

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect after successful insert
            header("Location: Worker_step2.php");
            exit();
        } else {
            die("Error inserting data: " . $stmt->error);
        }

        // Close statement
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }
}

// Close connection
$conn->close();
