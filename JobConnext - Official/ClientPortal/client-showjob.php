<?php include "../ClientPortal/recordFolder/recordPost.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../Assets/css/client-showjob.css">
    <link rel="stylesheet" href="../Assets/css/nav.css">
    <link rel="stylesheet" href="../ClientPortal/ModalFolder/modal_post.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Source+Code+Pro:wght@200..900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">

</head>

<body>
    <?php include "../ClientPortal/cardsFolder/Nav.php";?>
    
    <div class="container-fluid custom-container" id="main_content">
        <div class="add_job">
            <div class="dp_photo">
                <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                <input type="text" class="custom-input" placeholder="Post Something..." id="post_something">
            </div>
        </div>

        <div class="container worker_details">
            <div class="container worker_detail_header">

                <div class="modal-settings">
                    <a href="">
                        <img src="../Assets/image/Menu Vertical.png" alt="">
                    </a>
                </div>
                <div class="job-header">
                    <div class="profile-info">
                        <div class="avatar">
                            <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                        </div>
                        <div class="details">
                            <h3>Mr. Fixer</h3>
                            <p>11/8/2024 to 11/13/2024</p>
                            <p>Description</p>
                        </div>
                    </div>

                    <div class="active-menu">
                        <a href="../ClientPortal/client-inactive.php">
                            <button>
                                Active
                            </button>
                        </a>
                    </div>
                </div>
                <div class="short-info-container">
                    <div class="short-info">
                        <img src="../Assets/image/Location.png" alt="" style="border: none;">
                        <p>Makati</p>
                    </div>
                    <div class="short-info">
                        <img src="../Assets/image/Stack of Money.png" alt="">
                        <p>Php18,000₱-30,000₱</p>
                    </div>
                    <div class="short-info">
                        <img src="../Assets/image/Applicant.png" alt="">
                        <p>10 Applicants</p>
                    </div>
                    <div class="short-info">
                        <img src="../Assets/image/ic_outline-email.png" alt="">
                        <p>example@gmail.com</p>
                    </div>
                </div>
                <div class="skills-worker-details">
                    <p>Qualifications and Skills</p>
                </div>

                <div class="skills-available-details">
                    <span class="skill-tag green">Welder</span>
                    <span class="skill-tag purple">Electrician</span>
                </div>

                <div class="no-ex">
                    <p>◦ No year of experience</p>
                </div>
                <div class="responsibilities">
                    <h3>Responsibilities</h3>
                    <ol>
                        <li>Core Duties
                            <ul>
                                <li>Oversee and manage daily operations, ensuring efficiency and productivity.</li>
                                <li>Collaborate with cross-functional teams to align and execute projects.</li>
                                <li>Develop strategies to improve workflows and team outcomes.</li>
                            </ul>
                        </li>
                        <li>Project Management
                            <ul>
                                <li>Plan, track, and report on projects, meeting timelines and quality standards.</li>
                                <li>Communicate updates effectively with stakeholders.</li>
                            </ul>
                        </li>
                        <li>Team & Client Interaction
                            <ul>
                                <li>Lead and support team members, fostering a positive work environment.</li>
                                <li>Build and maintain client relationships, addressing concerns as needed.</li>
                            </ul>
                        </li>
                        <li>Continuous Improvement
                            <ul>
                                <li>Identify improvement areas and propose innovative solutions.</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="page_content">
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
                        My Job Offer
                    </p>
                </div>
            </div>
                <?php include "../ClientPortal/cardsFolder/jobOfferCard.php"?>
                
            <div class="row title-section">
                <div class="col-sm recommend-workers">
                    <p>
                        Recommended workers
                    </p>
                </div>
            </div>

            <?php include "../ClientPortal/cardsFolder/jobOfferCard.php"?>

                <div class="row title-section">
                    <div class="col other-offers">
                        <p>
                            Other Job Offers
                        </p>
                    </div>
                </div>
    <!-- hahahha mali -->
            <?php include "../ClientPortal/cardsFolder/jobOfferCard.php"?>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="client-rate.js">
    </script>
    <?php
    include "../ClientPortal/ModalFolder/post_job_modal.php";
    ?>
</body>

</html>