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
                            <a href="client_home.php">Home</a>
                            <a href="../ClientPortal/client_profile.php">Profile</a>
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
                <a href="client_profile.php" id="active-nav">Overview</a>
                <a href="profile-company.php" id="">Company Work</a>
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
                <div class="about-us-content">
                    <p>
                        We are a trusted construction company committed to delivering high-quality projects with precision and professionalism. With 4 years of experience, we specialize in commercial and industrial construction, renovations, and infrastructure development. Our dedicated team of experts ensures every project is completed on time, within budget, and to the highest standards of safety and excellence. At Company Org, we build not just structures, but lasting relationships with our clients.
                    </p>
                </div>
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
                        <p>Address Region City</p>
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
                            <span> +63 913-523-8455</span>
                        </li>
                        <li>Email Address:
                            <span>Company@gmail.com</span>
                        </li>
                        <li>Social Media Links:
                            <span>Company@yahoo.com</span>
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