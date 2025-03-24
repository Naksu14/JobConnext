<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
ob_start();

include "../db_con/db_connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>
<body>
    
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center position-relative">
    <div class="container-fluid ps-5 pe-5 pt-4 border border-2 rounded shadow bg-body-tertiary d-flex flex-column align-items-center" style="width: 30%;">
        <img src="../Assets/image/Logo1.png" width="90px" height="90px" alt="logo">
        <h2 class="poppins-bold m-0">Forgot <span style="color: #E46232;">Password</span></h2>

        <!-- // change this in form -->
        <form  method="post" onsubmit="return checkPassword(event)" class="d-flex flex-column mt-4 w-100">  
            <label for="New_password" class="poppins-medium">New Password</label>
            <div class="input-group d-flex flex-row">
                <input type="password" name="password" id="password" class="flex-grow-1" required>
                <button type="button" id="togglePassword" class=" btn btn-outline-secondary">
                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                </button>
            </div>

            <label for="Re-enter_password" class="poppins-medium">Re-enter Password</label>
            <div class="input-group d-flex flex-row">
            <input type="password" name="re_enter_password" id="re_enter_password" class="flex-grow-1"required>
            <button type="button" id="toggleReenterPassword" class="btn btn-outline-secondary">
                <i class="bi bi-eye-slash" id="toggleReenterPasswordIcon"></i>
            </button>
            </div>

            <div class="btn_sub d-flex justify-content-center mt-3 mb-3">
                <button type="submit" class="button-midblue" name="change_password" style="width: 200px;">Change Password</button>
            </div>
        </form>

        <p id="error-message" class="text-danger fs-6">Password must contain at least 8 characters 1 uppercase, 1 number and 1 special character</p>
    </div>
</div>


    <footer class="blockquote-footer text-white m-0 text-center" style="background-color: #161D6F;">
        <p>&copy; 2024 JobConnext. All rights reserved.</p>
        <p class="m-0">
            <a style="text-decoration: none; color: white;" href="#privacy-policy">Privacy Policy</a> | 
            <a style="text-decoration: none; color: white;" href="#terms-of-service">Terms of Service</a>
        </p>
    </footer>
    <script src="../Assets/js/function.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Check if form is submitted
if (isset($_POST['change_password'])) {
    if (!isset($_SESSION['worker_id']) && !isset($_SESSION['client_id'])) {
        die("Unauthorized access.");
    }

    $password = $_POST['password'];
    $worker_id = $_SESSION['worker_id'] ?? null;
    $client_id = $_SESSION['client_id'] ?? null;

    // Hash password
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if ($worker_id) {
        $update_stmt = $conn->prepare("UPDATE tbl_blue_collar_worker SET hash_password = ? WHERE worker_id = ?");
        $update_stmt->bind_param("si", $hash_password, $worker_id);
        $update_stmt->execute();
        $update_stmt->close();
    }

    if ($client_id) {
        $update_stmt = $conn->prepare("UPDATE tbl_client SET hash_password = ? WHERE client_id = ?");
        $update_stmt->bind_param("si", $hash_password, $client_id);
        $update_stmt->execute();
        $update_stmt->close();
    }

    // Redirect after successful update
    session_destroy();
    header("Location: Sign_In.php");
    exit();
}
?>