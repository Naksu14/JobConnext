<?php
session_start();
ob_start();
include '../db_con/db_connection.php';



if (isset($_POST['g-recaptcha-response'])) {
    $secretkey = '6LemMmUqAAAAAJfzMbn-18T28DEdG1iyV_khXl7p';
    $ip = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
    $fire = file_get_contents($url);
    $data = json_decode($fire);
    if ($data->success == true) {

        if (isset($_POST['signIn_btn'])) {
            $username_or_email = trim($_POST['usernameOremail']);
            $password = trim($_POST['password']);

            // Mapping tables to user ID column names and redirect URLs
            $table_map = [
                "tbl_blue_collar_worker" => ["id" => "worker_id", "redirect" => "../BlueCollarWorkerPortal/rejected-bluecollar.php"],
                "tbl_client"             => ["id" => "client_id", "redirect" => "../ClientPortal/client_home.php"],
                "tbl_admin"              => ["id" => "Admin_id", "redirect" => "../AdminPortal/AdminLandingPage.php"]
            ];

            $found_user = false;

            foreach ($table_map as $table => $info) {
                $query = "SELECT * FROM {$table} WHERE username = ? OR email = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $username_or_email, $username_or_email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['hash_password'])) {
                        $_SESSION[$info['id']] = $row[$info['id']];
                        header("Location: " . $info['redirect']);
                        exit();
                    } else {
                        $error = "Invalid credentials!";
                        $found_user = true;
                        break;
                    }
                }

                $stmt->close();
            }

            if (!$found_user) {
                $error = "User not found!";
            }

        }
    } else {
        $error = "Please Fill ReCaptcha!";
    }
}


?>




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
                <label for="usernameOremail" class="poppins-medium ">Username or Email</label>
                <input type="text" name="usernameOremail" id="usernameOremail" required>

                <label for="password" class="poppins-medium">Password</label>
                <div class="input-group d-flex flex-row">
                    <input type="password" name="password" id="password" class="flex-grow-1" required>
                    <button type="button" id="togglePassword" class=" btn btn-outline-secondary">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </button>
                </div>

                <p class="poppins-regular"><a href="ForgotPassword.php" style="color: black;">Forget password?</a></p>

                <div class="g-recaptcha" data-sitekey="6LemMmUqAAAAAG2OKgk5lSoKL4LLBU8QOO5pKw-K"></div>

                <?php if (isset($error)) : ?>
                    <p align="center" style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <div class="btn_sub d-flex justify-content-center mt-3 mb-3">
                    <button type="submit" class="button-midblue" name="signIn_btn" style="width: 200px;">Sign In</button>
                </div>
            </form>

            <p class="poppins-regular">Create account? <span><a href="Sign_Up.php" style="text-decoration: none; color: #161D6F;">Sign Up</a></span></p>
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