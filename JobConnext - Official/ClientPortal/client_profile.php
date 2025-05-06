<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/client_profile.css">
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
                        <?php  include '../ClientPortal/template/tmplt_clientProfile.php'; ?>

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
                <a href="client_profile.php" id="active-nav">Overview</a>
                <?php
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    include "../db_con/db_connection.php";

                   
                    if (isset($_SESSION['client_id'])) {
                        $clientId = $_SESSION['client_id'];
                        $query = "SELECT company_name FROM tbl_company_info WHERE client_id = ? ";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $clientId);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $companyName = $row['company_name'];
                        } else {
                            $companyName = "Company Work";
                        }
                        $stmt->close();
                    } else {
                        $companyName = "Guest";
                    }
                ?>
                        <a href="profile-company.php" id=""><?php echo $companyName; ?></a>
            </div>
            <div class="create-header">
                <img src="../Assets/image/Create.png" alt="">
            </div>

            <div class="about-us">
                <div class="about-us-header">
                    <span>
                        About Us
                    </span>
                </div>
                <?php

                // about us

                if (session_status() === PHP_SESSION_NONE) {
                    session_start(); 
                }
                include "../db_con/db_connection.php";

                
                if (isset($_SESSION['client_id'])) {
                    $clientId = $_SESSION['client_id'];
                    $query = "SELECT company_aboutUs FROM tbl_company_info WHERE client_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $clientId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $clientAboutUs = $row['company_aboutUs'];
                    } else {
                        $clientAboutUs = "About Us information is not available at the moment.";
                    }
                    $stmt->close();
                } else {
                    $clientAboutUs = "You are not logged in.";
                }
                ?>
                <p>
                    <?php echo $clientAboutUs; ?>
                </p>
            </div>
            <div class="address">
                <div class="address-header">
                    <span>
                        Address
                    </span>
                </div>
                <div class="address-content">
                    <h6 id="header-address">
                        <img src="../Assets/image/Location.png" alt="">
                        <p>                   
                <?php

                    // address

                    if (session_status() === PHP_SESSION_NONE) {
                        session_start(); 
                    }
                    include "../db_con/db_connection.php";

                   
                    if (isset($_SESSION['client_id'])) {
                        $clientId = $_SESSION['client_id'];
                        $query = "SELECT company_Address FROM tbl_company_info WHERE client_id = ? ";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $clientId);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $clientAddress = $row['company_Address'];
                        } else {
                            $clientAddress = "About Us information is not available at the moment.";
                        }
                        $stmt->close();
                    } else {
                        $clientAddress = "You are not logged in.";
                    }
                ?>
                <p>
                    <?php echo $clientAddress; ?>
                </p></p>
                    </h6>
                </div>
                <div class="address-img">
                    <div class="show-location">
                        <img src="../Assets/image/image.png" alt="">
                    </div>
                </div>
            </div>
            <div class="contact">
                <div class="contact-header">
                    <span>
                        Contact Information
                    </span>
                </div>
                <div class="contact-content">
                    <ul>
                        <li>Phone no.:
                            <span> 
                    <?php

                        // phone number

                        if (session_status() === PHP_SESSION_NONE) {
                            session_start(); 
                        }
                        include "../db_con/db_connection.php";

                      
                        if (isset($_SESSION['client_id'])) {
                            $clientId = $_SESSION['client_id'];
                            $query = "SELECT phone_no FROM tbl_client_information WHERE client_id = ? ";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $clientId);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $clientPhoneNumber = $row['phone_no'];
                            } else {
                                $clientPhoneNumber = "About Us information is not available at the moment.";
                            }
                            $stmt->close();
                        } else {
                            $clientPhoneNumber = "You are not logged in.";
                        }
                    ?>
                <p>
                    <?php echo $clientPhoneNumber; ?>
                </p>
                    </span>
                        </li>
                        <li>Email Address:
                            <span>
                                
                    <?php

                        // email address
                        
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start(); 
                        }
                        include "../db_con/db_connection.php";

                      
                        if (isset($_SESSION['client_id'])) {
                            $clientId = $_SESSION['client_id'];
                            $query = "SELECT email FROM tbl_client WHERE client_id = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $clientId);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $clientEmail = $row['email'];
                            } else {
                                $clientEmail = "About Us information is not available at the moment.";
                            }
                            $stmt->close();
                        } else {
                            $clientEmail = "You are not logged in.";
                        }
                    ?>
                        <p>
                            <?php echo $clientEmail; ?>
                        </p>
                            </span>
                        </li>
                        <li>Social Media Links:
                            <span>
                        <?php

                            // email address

                            if (session_status() === PHP_SESSION_NONE) {
                                session_start(); 
                            }
                            include "../db_con/db_connection.php";


                            if (isset($_SESSION['client_id'])) {
                                $clientId = $_SESSION['client_id'];
                                $query = "SELECT email FROM tbl_client WHERE client_id = ? ";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("i", $clientId);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $clientEmail = $row['email'];
                                } else {
                                    $clientEmail = "About Us information is not available at the moment.";
                                }
                                $stmt->close();
                            } else {
                                $clientEmail = "You are not logged in.";
                            }
                        ?>
                            <p>
                                <?php echo $clientEmail; ?>
                            </p>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>