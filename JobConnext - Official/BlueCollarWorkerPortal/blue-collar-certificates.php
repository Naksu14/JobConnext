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
    <link rel="stylesheet" href="../Assets/css/blue-collar-certificates.css">
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
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col">
                <div class="container-fluid" id="logo">
                    <img src="../Assets/image/462566530_896228739052589_2655126183685351288_n.png" alt="">
                </div>
            </div>
            <div class="col">
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
            <div class="col">
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
                <a href="../BlueCollarWorkerPortal/application-bluecollar.php" id="a">Application</a>
                <a href="../BlueCollarWorkerPortal/overview-profile.php">Experiences</a>
                <a href="blue-collar-certificates.php" id="active-nav">Certificate and others</a>
            </div>

            <div class="create-header">
                <div class="create">
                    <img src="../Assets/image/Create.png" alt="">
                </div>
            </div>

            <div class="container certifications">
                <span>Certifications</span>
            </div>
            <div class="all-cert">
                <ol>
                    <li>
                        Occupational Safety and Health (OSHA) Certification
                    </li>
                    <li>
                        First Aid and CPR Certification
                    </li>
                    <li>
                        TESDA National Certificate (NC) – (e.g., NC II in Electrical Installation and Maintenance, Plumbing, Welding, etc.)
                    </li>
                    <li>
                        Forklift Operator License
                    </li>
                    <li>
                        Hazardous Materials (HAZMAT) Certification
                    </li>
                    <li>
                        Workplace Hazardous Materials Information System (WHMIS)
                    </li>
                </ol>
            </div>
            <div class="container certifications">
                <span>Accomplishments</span>
            </div>
            <div class="all-cert">
                <ul>
                    <li>
                        Successfully completed [specific number] of [projects/installations/orders].
                    </li>
                    <li>
                        Reduced [time/costs/downtime] by [specific percentage] through innovative methods.
                    </li>
                    <li>
                        Consistently met or exceeded safety standards and quality benchmarks.
                    </li>
                </ul>
            </div>
            <div class="add-info">
                <div class="button-add-info">
                    <button>Add Info</button>
                </div>
            </div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
</body>

</html>