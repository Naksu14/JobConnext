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
    <div class="container-fluid ps-5 pe-5 pt-4 border border-2 rounded shadow bg-body-tertiary d-flex flex-column align-items-center" style="width: auto;">
        <img src="../Assets/image/Logo1.png" width="90px" height="90px" alt="logo">
        <h2 class="poppins-bold m-0">Forgot <span style="color: #E46232;">Password</span></h2>

        <!-- // change this in form -->
        <form action="email_verification.php" method="post" class="d-flex flex-column mt-4">  
            <label for="email" class="poppins-medium">Email</label>
            <input type="text" name="email" id="email" required>

            <div class="btn_sub d-flex justify-content-center mt-3 mb-3">
                <button class="button-midblue" name="send_email_btn" style="width: 200px;" type="submit">Send</button>
            </div>
        </form>

        <p class="poppins-regular">Remember your password? <span><a href="SIgn_In.php" style="text-decoration: none; color: #161D6F;">Sign In</a></span></p>
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
</body>
</html>