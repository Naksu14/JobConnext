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
    <title>OTP Verification</title>
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>
<body>
    
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center position-relative">
    <div class="container-fluid p-5 border border-2 rounded shadow bg-body-tertiary d-flex flex-column align-items-center" style="width: auto;">
        <img src="../Assets/image/Logo1.png" width="90px" height="90px" alt="logo">
        <h2 class="poppins-bold m-0">OTP <span style="color: #E46232;">Verification</span></h2>

        <form action="" method="post" class="d-flex flex-column mt-4">  
            <label for="otp" class="poppins-medium">Enter OTP</label>
            <div class="input_numbers d-flex flex-row align-items-center justify-content-center">
                <input style="width: 50px; height: 50px; margin: 10px;" type="text" name="input_num1" maxlength="1" required>
                <input style="width: 50px; height: 50px; margin: 10px;" type="text" name="input_num2" maxlength="1" required>
                <input style="width: 50px; height: 50px; margin: 10px;" type="text" name="input_num3" maxlength="1" required>
                <input style="width: 50px; height: 50px; margin: 10px;" type="text" name="input_num4" maxlength="1" required>
                <input style="width: 50px; height: 50px; margin: 10px;" type="text" name="input_num5" maxlength="1" required>
                <input style="width: 50px; height: 50px; margin: 10px;" type="text" name="input_num6" maxlength="1" required>
            </div>

            <div class="btn_sub d-flex justify-content-center mt-3 mb-3">
                <button type="submit" class="button-midblue" name="send_email_btn" style="width: 200px;">Verify</button>
            </div>
        </form>

        <a href="#"><p class="poppins-regular">Resend OTP</p></a>
        <div class="btn_sub d-flex justify-content-between mt-3 mb-3">
            <a href="ForgotPassword.php" style="color:#161D6F">
                <span><i class="bi bi-arrow-left"></i></span> Back
            </a>
        </div>
    </div>
</div>

<footer class="blockquote-footer text-white m-0 text-center" style="background-color: #161D6F;">
    <p>&copy; 2024 JobConnext. All rights reserved.</p>
    <p class="m-0">
        <a style="text-decoration: none; color: white;" href="#privacy-policy">Privacy Policy</a> | 
        <a style="text-decoration: none; color: white;" href="#terms-of-service">Terms of Service</a>
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
if (isset($_POST['send_email_btn'])) {
    // Concatenate OTP values properly as a string
    $otp_number_value = intval(
        $_POST['input_num1'] . $_POST['input_num2'] . $_POST['input_num3'] .
        $_POST['input_num4'] . $_POST['input_num5'] . $_POST['input_num6']
    );

    // Fetch user session IDs
    $worker_id = $_SESSION['worker_id'] ?? '';
    $client_id = $_SESSION['client_id'] ?? '';

    // Function to verify OTP
    function verifyOTP($conn, $table, $id_column, $user_id, $otp_number_value) {
        if (!empty($user_id)) {
            $stmt = $conn->prepare("SELECT otp_verification FROM $table WHERE $id_column = ?");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($otp_number_value == $row['otp_verification']) {
                    // Update user status
                    $update_stmt = $conn->prepare("UPDATE $table SET status = 1 WHERE $id_column = ?");
                    $update_stmt->bind_param("s", $user_id);
                    $update_stmt->execute();
                    $update_stmt->close();

                    header("Location: ChangePassword.php");
                    exit();
                } else {
                    echo "<script>alert('Invalid OTP. Please try again.');</script>";
                }
            }
            $stmt->close();
        }
    }

    // Verify for both workers and clients
    verifyOTP($conn, "tbl_blue_collar_worker", "worker_id", $worker_id, $otp_number_value);
    verifyOTP($conn, "tbl_client", "client_id", $client_id, $otp_number_value);
}
?>
