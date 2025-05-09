<?php
    session_start();
    include '../db_con/db_connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Profile</title>
    <script>
        window.sessionData = {
            user_id: <?php echo json_encode($user_id); ?>
        };
    </script>
    <script src="../Assets/js/fetchData.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../Assets/css/Client Css/profile-company.css">
    <link rel="stylesheet" href="../ClientPortal/ModalFolder/modal_post.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">

</head>

<body>
<?php include "../ClientPortal/components/navbar.php"?>
    <div class="container-fluid main-content">
        <div class="settings-container">
            <a href="profile-settings.php">
                <img src="../Assets/image/Settings.png" alt="">
            </a>
        </div>
        <div class="container-fluid full-content">
            <div class="container-fluid profile-content">
                <div class="client-photo">
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                    <div class="name-title">
                        <span>
                            Company Org.
                        </span>
                        <h6>
                            Construction
                        </h6>
                    </div>
                </div>
                <div class="client_id">
                    <!-- <span>
                        ID: 000000
                    </span> -->
                </div>
            </div>

            <div class="container-fluid profile-nav">
                <a href="client_profile.php" id="a">Overview</a>
                <a href="../ClientPortal/profile-company.php" id="active-nav">Company Work</a>
            </div>

            <div class="create-header">
                <div class="container-fluid card-holder">
                    <div class="card card-header">
                        <div class="card-body">
                            <span id="card-title">
                                Job List <span id="card-count">5</span>
                            </span>
                        </div>
                    </div>
                    <div class="card card-header">
                        <div class="card-body">
                            <span id="card-title">
                                Employee <span id="card-count">22</span>
                            </span>
                        </div>
                    </div>
                    <div class="card card-header">
                        <div class="card-body">
                            <span id="card-title">
                                Applicant <span id="card-count">8</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container job-offer">
                <span>Job Offer</span>
            </div>
            <div class="add_job">
                <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                <input
                    type="text"
                    class="custom-input"
                    placeholder="Post Something..."
                    id="postJob"
                    readonly
                    data-bs-toggle="modal"
                    data-bs-target="#postModal">
            </div>


            <!-- JOB OFFERED CARD -->
            <?php  include '../ClientPortal/template/tmplt_job_offered.php'; ?>

            <!-- <div class="container see-more">
                <span>
                    See more
                </span>
            </div> -->

            <div class="container comp-review">
                <span>
                    Company Review
                </span>
            </div>

            <div class="worker_rate">
                <div class="card" id="my-offer">
                    <div class="job-header-rate">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg"
                                    alt="Avatar">
                            </div>
                            <div class="details-client">
                                <div class="feedback-header">
                                    <div class="rate-header">
                                        <h3>Maxwell Cruz</h3>
                                        <div class="star-rating">
                                            <span class="star" data-value="1">★</span>
                                            <span class="star" data-value="2">★</span>
                                            <span class="star" data-value="3">★</span>
                                            <span class="star" data-value="4">★</span>
                                            <span class="star" data-value="5">★</span>
                                            <p>5.0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="skills">
                                    <p><strong>Skills:</strong></p>
                                    <span class="skill-tag green">Welder</span>
                                    <span class="skill-tag purple">Electrician</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="worker-message">
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                    </div>
                    <div class="review-footer">
                        <div class="report-menu">
                            Report
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
            <?php
                include "../ClientPortal/ModalFolder/post_job_modal.php";
            ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
             <script src="../Assets/js/function.js"></script>

</body>

</html>