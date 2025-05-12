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
    <link rel="stylesheet" href="../Assets/css/overview-profile.css">
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
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
</head>


<body>
    <?php include "../BlueCollarWorkerPortal/components/navbar.php" ?>

    <div class="container-fluid main-content">
        <div class="settings-container">
            <a href="../BlueCollarWorkerPortal/profile-settings.php">
                <img src="../Assets/image/Settings.png" alt="">
            </a>
        </div>
        <div class="container-fluid full-content">
            <div class="container-fluid profile-content">
                <div class="client-photo">
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                    <div class="name-title">
                        <span>
                            Block Chain
                        </span>
                        <h6>
                            <img src="../Assets/image/User.png" alt="">
                            Freelance
                        </h6>
                        <h6>
                            <img src="../Assets/image/Location.png" alt="">
                            Address Region City
                        </h6>
                        <div class="skills">
                            <p>Skills:</p>

                        </div>
                        <div class="skill-card">
                            <span class="skill-tag green">Welder</span>
                            <span class="skill-tag purple">Electrician</span>
                        </div>

                    </div>
                </div>
                <div class="client_id">
                    <span>
                        ID: 000000
                    </span>
                </div>
            </div>


            <div class="container-fluid profile-nav">
                <a href="../BlueCollarWorkerPortal/application-bluecollar.php">Application</a>
                <a href="../BlueCollarWorkerPortal/overview-profile.php" id="active-nav">Experiences</a>
                <a href="blue-collar-certificates.php">Certificate and others</a>
            </div>

            <div class="create-header">
                <div class="create">
                    <img src="../Assets/image/Create.png" alt="">
                </div>
            </div>

            <div class="container certifications">
                <span>Experience Overview</span>
            </div>
            <div class="all-cert">
                <ul>
                    <li>
                        Company Name: (Include the names of past employers or clients)
                    </li>
                    <li>
                        Position: (e.g., Foreman, Technician, Machine Operator)
                    </li>
                    <li>
                        Duration: (e.g., Jan 2018 – Present)
                    </li>
                    <li>
                        Key Responsibilities: <ul>
                            <li>[Insert tasks such as installation, repair, maintenance, etc.]</li>
                            <li>[Include any supervisory roles or team coordination]</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="container certifications">
                <span>Work Conditions</span>
            </div>
            <div class="all-cert">
                <ul>
                    <li>
                        Familiar with [specific environments, e.g., construction sites, factories, outdoor work].
                    </li>
                    <li>
                        Experience working with shifts or extended hours.
                    </li>
                </ul>
            </div>
            <div class="work-history">
                <span>History</span>
                <div class="col-sm-12">
                    <div class="card" id="my-offer">
                        <a href="../BlueCollarWorkerPortal/rejected-bluecollar.php">
                            <div class="job-header">
                                <div class="profile-info">
                                    <div class="avatar">
                                        <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                    </div>
                                    <div class="details">
                                        <h3>Supra Oracles</h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="job-dates">
                                    <img src="../Assets/image/bookmark-white 1 original.png " alt=""
                                        style="width:17px; height: 17px; background-color:#161D6F; border-radius: 0%; margin:7px;">
                                </div>
                            </div>
                            <div class="job-body">
                                <div class="info">
                                    <p>
                                        <strong>Location:</strong>
                                        Makati
                                    </p>
                                    <p>
                                        <strong>Time of Completion:</strong> 3 Months
                                    </p>
                                    <p>
                                        <strong>Total Salary</strong> 15,000
                                    </p>
                                </div>
                                <div class="completed-sign">
                                    <span>Job Completed</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <div class="card" id="my-offer">
                            <a href="../BlueCollarWorkerPortal/rejected-bluecollar.php">
                                <div class="job-header">
                                    <div class="profile-info">
                                        <div class="avatar">
                                            <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg"
                                                alt="Avatar">
                                        </div>
                                        <div class="details">
                                            <h3>Supra Oracles</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="job-dates">
                                        <img src="../Assets/image/bookmark-white 1 original.png " alt=""
                                            style="width:17px; height: 17px; background-color:#161D6F; border-radius: 0%; margin:7px;">
                                    </div>
                                </div>
                                <div class="job-body">
                                    <div class="info">
                                        <p>
                                            <strong>Location:</strong>
                                            Makati
                                        </p>
                                        <p>
                                            <strong>Time of Completion:</strong> 3 Months
                                        </p>
                                        <p>
                                            <strong>Total Salary</strong> 15,000
                                        </p>
                                    </div>
                                    <div class="completed-sign">
                                        <span>Job Completed</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>



                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                        crossorigin="anonymous">
                        </script>
        <script src="../Assets/js/logout.js"></script>

</body>

</html>