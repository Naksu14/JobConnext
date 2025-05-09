<?php
session_start();
include '../../db_con/db_connection.php';
$user_id = $_SESSION['worker_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    <link rel="stylesheet" href="../Assets/css/blue-colar-landing.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Source+Code+Pro:wght@200..900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-4">
                <div class="container-fluid" id="logo">
                    <img src="../Assets/image/462566530_896228739052589_2655126183685351288_n.png" alt="">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container-fluid" id="nav_list">
                    <ul>
                        <li>
                            <a href="../BlueCollarWorkerPortal/blue-collar-landing.php">Home</a>
                            <a href="../BlueCollarWorkerPortal/blue-collar-certificates.php">Profile</a>
                            <a href="../ClientPortal/client-message.php">Message</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="container-fluid">
                    <a href="../GuessPortal/LandingPage.php">
                        <button id="logout_butt">
                            Logout
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid custom-container" id="main_content">
        <div class="header-details">
            <div class="header-container">
                <h2>
                    Are you looking for a Freelance job?
                </h2>
            </div>
            <div class="header-content">
                <h6>
                    JOBCONNEXT is a place where you can find a freelance job in a various skill more than 10,000 freelance jobs are available here
                </h6>
            </div>
        </div>

        <div class="container worker_details">
            <div class="container worker_detail_header">
            </div>
        </div>
        <div class=" page_content">
            <div class="row content-header">
                <div class="col-sm-3">
                    <div class="container-fluid content-filter">
                        <button>
                            <img src="../Assets/image/filter (1) 1.png" alt="">
                            <span>
                                Filter
                            </span>
                        </button>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="container-fluid freelance-search">
                        <input type="text" placeholder="  Search for workers..." id="freelance-search">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="seek-worker">
                        <button>
                            <span>
                                Seek
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row title-section">
                <div class="col content-title">
                    <p>
                        Accepting Application
                    </p>
                </div>
            </div>
            <div class="offer-area">
                <div class="row job-card">
                    <div class="col-12">
                        <!-- JOB OFFERED CARD -->
                        <?php include '../ClientPortal/template/tmplt_job_offered.php'; ?>

                    </div>
                </div>
            </div>
        </div>
        

        
</body>

</html>