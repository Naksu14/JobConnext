<?php
include "../db_con/db_connection.php";

session_start();

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



    <div class="container-fluid vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="text d-flex flex-column align-items-center">
            <img src="../Assets/image/Logo1.png" width="90px" height="90px" alt="logo">
            <h2 class="poppins-bold">Sign <span style="color: #E46232;">Up</span></h2>
            <p class="poppins-regular">Choose what account do you want to create</p>
        </div>
        <div class="p-3 w-75 d-flex align-items-center justify-content-around">
            <a href="?user=worker">
                <img src="../Assets/image/Worker_Picture.png" class="blur-container border border-2 rounded shadow bg-body-tertiary" width="300px" height="300px" alt="Worker_img">
                <p class="poppins-regular text-center mt-4">Create Blue Collar Acccount</p>
            </a>
            <a href="?user=client">
                <img src="../Assets/image/Client_Picture.png" class="blur-container border border-2 rounded shadow bg-body-tertiary" width="300px" height="300px" alt="client_img">
                <p class="poppins-regular text-center mt-4">Create Account to Hire Workers</p>
            </a>
        </div>
        <p class="poppins-regular m-0 mt-3">Already have account? <span><a href="Sign_In.php" style="text-decoration: none; color: #161D6F;">Sign In</a></span></p>
    </div>



    <footer class="blockquote-footer text-white m-0 text-center" style="background-color: #161D6F;">
        <p>&copy; 2024 JobConnext. All rights reserved.</p>
        <p class="m-0">
            <a style="text-decoration: none; color: white;" href="#privacy-policy">Privacy Policy</a> |
            <a style="text-decoration: none; color: white;" href="#terms-of-service">Terms of Service</a>
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_GET['user']) && $_GET['user'] == "client") {
    header("location: ../GuessPortal/Clientform_step1.php");
} else if (isset($_GET['user']) && $_GET['user'] == "worker") {
    header("location: ../GuessPortal/Worker_step1.php");
    $_SESSION['worker'] = 'worker';
}

?>