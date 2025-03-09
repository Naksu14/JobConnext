<?php
session_start();
ob_start(); // Ensure no output is sent before header redirection
include '../db_con/db_connection.php';

if (isset($_POST['signIn_btn'])) {
    $username_or_email = $_POST['usernameOremail'];
    $password = $_POST['password'];

    // Prepare a query to check both username and email
    $query = "SELECT * FROM tbl_blue_collar_worker WHERE username =  '$username_or_email' or email =  '$username_or_email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $hashed_password = $row['hash_password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['worker_id'] = $row['worker_id'];
            $_SESSION['username'] = $row['username'];

            // Redirect to dashboard
            header("Location: ../BlueCollarWorkerPortal/blue-collar-land.php");
            exit();
        } else {
            $error = "Invalid credentials!";
        }
    } else {
        $error = "User not found!";
    }
}

?>

<!-- Display errors if any -->
<?php if (isset($error)) : ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>

<body>

    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center position-relative">
        <div class="position-absolute bottom-0 end-0 p-2">
            <h6 class="rounded shadow p-2" style="background-color: #E46232;">
                <a href="LandingPage.php" style="color: white">
                    <i class="bi bi-arrow-left-circle"></i> Go back
                </a>
            </h6>
        </div>
        <div class="container-fluid ps-5 pe-5 pt-4 border border-2 rounded shadow bg-body-tertiary d-flex flex-column align-items-center" style="width: auto;">
            <img src="../Assets/image/Logo1.png" width="90px" height="90px" alt="logo">
            <h2 class="poppins-bold m-0">Sign <span style="color: #E46232;">In</span></h2>

            <form action="" method="post" class="d-flex flex-column mt-4">
                <label for="usernameOremail" class="poppins-medium">Username or Email</label>
                <input type="text" name="usernameOremail" id="usernameOremail" required>

                <label for="password" class="poppins-medium">Password</label>
                <div class="input-group d-flex flex-row">
                    <input type="password" name="password" id="password" class="flex-grow-1" required>
                    <button type="button" id="togglePassword" class=" btn btn-outline-secondary">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </button>
                </div>

                <p class="poppins-regular"><a href="ForgotPassword.php" style="color: black;">Forget password?</a></p>

                <div class="g-recaptcha" data-sitekey="6LdKLJwqAAAAAEYqq4rErAVcCcdBzApCkFzeXpzc"></div>

                <?php if (isset($errorMsg)): ?>
                    <p id="errorMsg" class="text-danger fs-6"><?= $errorMsg; ?></p>
                <?php endif; ?>

                <div class="btn_sub d-flex justify-content-center mt-3 mb-3">
                    <button type="submit" class="button-midblue" name="signIn_btn" style="width: 200px;">Sign In</button>
                </div>
            </form>

            <p class="poppins-regular">Create account? <span><a href="SIgn_Up.php" style="text-decoration: none; color: #161D6F;">Sign Up</a></span></p>
        </div>
    </div>

    <footer class="blockquote-footer text-white m-0 text-center" style="background-color: #161D6F;">
        <p>&copy; 2024 JobConnext. All rights reserved.</p>
        <p class="m-0">
            <a style="text-decoration: none; color: white;" href="#privacy-policy">Privacy Policy</a> |
            <a style="text-decoration: none; color: white;" href="#terms-of-service">Terms of Service</a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../Assets/js/function.js"></script>
</body>

</html>