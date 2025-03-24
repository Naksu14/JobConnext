<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
ob_start();

include '../db_con/db_connection.php';

$_SESSION['email'] = $_POST['email'];

$email = $_SESSION['email'] ?? null;

if (!$email) {
    die('Email not found. Please try again.');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function generateOTP($length = 6) {
    return str_pad(random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
}

function updateOTP($conn, $table, $email, $otp) {
    $stmt = $conn->prepare("UPDATE $table SET status = 0, otp_verification = ? WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $otp, $email);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Error updating OTP: " . $conn->error);
    }
}

function checkUserAndUpdateOTP($conn, $email, $otp) {
    $tables = [
        'tbl_blue_collar_worker' => 'worker_id',
        'tbl_client' => 'client_id'
    ];

    foreach ($tables as $table => $id_column) {
        $stmt = $conn->prepare("SELECT $id_column FROM $table WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION[$id_column] = $row[$id_column];
            updateOTP($conn, $table, $email, $otp);
        }
        $stmt->close();
    }
}

$otp_value = generateOTP();
checkUserAndUpdateOTP($conn, $email, $otp_value);
$conn->close();

function sendOTP($email, $otp_value) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jobconnext2025@gmail.com';
        $mail->Password = 'wgfgpzwjaldnfmhe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('jobconnext2025@gmail.com', 'JobConnext');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Job Connext OTP Verification';
        $mail->Body = "<h1>Hello!</h1><p>Your OTP is: <strong>$otp_value</strong></p>";

        $mail->send();
        header("Location: OTPVerification.php");
        exit();
    } catch (Exception $e) {
        error_log("Email could not be sent. Error: " . $mail->ErrorInfo);
        echo "Failed to send OTP. Please try again.";
    }
}

sendOTP($email, $otp_value);
?>
