<?php
session_start();
include '../db_con/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/Client Css/profile-settings.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
</head>

<body>
    <?php include "../ClientPortal/components/navbar.php" ?>
    <div class="container-fluid main-content">
        <div class="container-fluid full-content">
            <div class="container-fluid header-1">
                <div class="header1-content">
                    <span id="acc_sett">
                        Account Settings
                    </span>
                    <p id="sub-text">Real-time information and activities of your properties</p>
                </div>
            </div>
            <div class="container-fluid header-2">
                <div class="header-left">
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                    <div class="header-left-title">
                        <span id="uname">Username</span>
                        <span id="id-num">ID:34525346</span>
                    </div>
                </div>
                <div class="header-right">
                    <div class="button-upload">
                        <button>
                            Upload New Picture
                        </button>
                        <button>
                            Delete
                        </button>
                        <div class="statement-down">
                            <span>jpg,png and jpeg with size 196 x 196 px 15mb only</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="section-1">
                <span>Full Name</span>
            </div>
            <div class="container-fluid name-reg">
                <div class="row">
                    <div class="col">First Name
                        <input class="form-control" type="text" placeholder="" aria-label="default input example">
                    </div>

                    <div class="col">Last Name
                        <input class="form-control" type="text" placeholder="" aria-label="default input example">
                    </div>
                    <div class="col">Middle Name
                        <input class="form-control" type="text" placeholder="" aria-label="default input example">
                    </div>
                </div>
            </div>
            <div class="section-2">
                <span>Contact Email</span>
            </div>
            <div class="c-email">
                <span>
                    Manage your accounts email address for the invoices
                </span>
                <div class="container-fluid email-reg">
                    <div class="row">
                        <div class="col">Email
                            <input class="form-control" type="text" placeholder="" aria-label="default input example">
                        </div>
                        <div class="col">
                            <div class="button-email">
                                <button>
                                    Upload New Picture
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-3">
                    <span>Password</span>
                </div>
                <div class="c-email">
                    <span>
                        Change Password
                    </span>
                    <div class="container-fluid pass-reg">
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputPassword1" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="col">
                                <label for="exampleInputPassword1" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-footer">
                    <div class="save-butt">
                        <button>
                            Save
                        </button>
                    </div>
                </div>
                <br><br><br><br><br>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
             <script src="../Assets/js/function.js"></script>

</body>

</html>