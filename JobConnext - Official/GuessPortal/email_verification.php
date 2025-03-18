<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();

include "../db_con/db_connection.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // If using Composer
// require 'path/to/PHPMailer/src/PHPMailer.php'; // Manual installation
// require 'path/to/PHPMailer/src/SMTP.php';
// require 'path/to/PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

$email = $_POST['email'];

function generateOTP($length = 6) {
    if ($length < 4 || $length > 10) {
        throw new Exception("OTP length should be between 4 and 10 digits.");
    }

    $otp = "";
    for ($i = 0; $i < $length; $i++) {
        $otp .= rand(0, 9);
    }
    return $otp;
}

$otp_value = generateOTP();

$stmt = $conn->prepare("SELECT email, worker_id FROM tbl_blue_collar_worker WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION['worker_id'] = $row['worker_id'];

    $stmt = $conn->prepare("UPDATE tbl_blue_collar_worker SET status = 0, otp_verification = ? WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $otp_value, $email);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Error in preparing statement for worker: " . $conn->error);
    }
} else {
    $stmt->close();
    $conn->close();
}

$stmt = $conn->prepare("SELECT email, client_id FROM tbl_client WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION['client_id'] = $row['client_id'];

    $stmt = $conn->prepare("UPDATE tbl_client SET status = 0, otp_verification = ? WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $otp_value, $email);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Error in preparing statement for client: " . $conn->error);
    }

} else {
    $stmt->close();
    $conn->close();
}

try {
    // Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';               // SMTP server (e.g., smtp.gmail.com)
    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
    $mail->Username   = 'jobconnext2025@gmail.com';         // SMTP username
    $mail->Password   = 'wgfgpzwjaldnfmhe';            // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable encryption (TLS)
    $mail->Port       = 587;     
    
    $mail->SMTPDebug = 3; // Set to 3 for more details
    $mail->Debugoutput = 'html';// TCP port (587 for TLS, 465 for SSL)

    // Sender & Recipient

    $mail->setFrom('jobconnext2025@gmail.com', 'JobConnext');
    $mail->addAddress($email, 'User');

    // Email Content
    $mail->isHTML(true);
    $mail->Subject = 'Job Connext';
    $mail->Body    = "<h1>Hello!</h1><p>This is your OTP number $otp_value</p>";

    // Send the email
    $mail->send();

    header("location: OTPVerification.php");
    ob_end_flush();
    exit();
} catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
}
?>