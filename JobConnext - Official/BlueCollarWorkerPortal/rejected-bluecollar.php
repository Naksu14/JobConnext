<?php
session_start();
include '../db_con/db_connection.php';
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
    <link rel="stylesheet" href="../Assets/css/Blue-collar css/rejected-bluecollar.css">
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
                            <a href="../ClientPortal/client_profile.php">Profile</a>
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
                <div class="modal-settings">
                    <div class="report-container">
                        <img src="../Assets/image/bookmark.png" alt="">
                        <span data-bs-toggle="modal" data-bs-target="#reportModal"
                            onclick="showAlert()">
                            Report
                        </span>
                    </div>
                </div>
                <div class="job-header">
                    <div class="profile-info">
                        <div class="avatar">
                            <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                        </div>
                        <div class="details">
                            <h3>Supra Oracles</h3>
                            <p>11/8/2024 to 11/13/2024</p>
                            <p>Description</p>
                        </div>
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
                <div class="rejected-tab">
                    <span>
                        Sorry to say that you are rejected in this job offer.
                        <span style="font-weight: bolder; color:#55A64D; margin-top:20px;">You can view the Related Job Section for Suggestions related to your skills</span>
                    </span>
                </div>
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
                        Jobs Offered
                    </p>
                </div>
            </div>
            <div class="offer-area">
                <div class="row job-card">
                    <div class="col-12">
                        <!-- JOB OFFERED CARD -->
                        <?php include '../BlueCollarWorkerPortal/Template/offeredJobsTmplt.php'; ?>

                    </div>
                </div>
            </div>
            <div class="suggestion-card">
                <span>
                    Related Job Suggestions
                </span>
            </div>


            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row job-card">
                            <div class="col-sm-12">

                                <div class="card" id="my-offer">
                                    <a href="../BlueCollarWorkerPortal/accepted-bluecollar.php">
                                        <div class="job-header">
                                            <div class="profile-info">
                                                <div class="avatar">
                                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                                </div>
                                                <div class="details">
                                                    <h3>Supra Oracles 1</h3>
                                                    <p>Php18,000₱–30,000₱ • 10 Applicants • Active</p>
                                                </div>
                                            </div>
                                            <div class="job-dates">
                                                <img src="../Assets/image/bookmark-white 1 original.png " alt="" style="width:17px; height: 17px; background-color:#161D6F; border-radius: 0%; margin:7px;">
                                            </div>
                                        </div>
                                        <div class="job-body">
                                            <div class="info">
                                                <p>
                                                    <strong>Location:</strong>
                                                    Makati
                                                </p>
                                                <p>
                                                    <strong>Years of experience:</strong> 0
                                                </p>
                                            </div>
                                            <div class="skills">
                                                <p><strong>Skills needed:</strong></p>
                                                <span class="skill-tag green">Welder</span>
                                                <span class="skill-tag purple">Electrician</span>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row job-card">
                            <div class="col-sm-12">

                                <div class="card" id="my-offer">
                                    <a href="../BlueCollarWorkerPortal/accepted-bluecollar.php">
                                        <div class="job-header">
                                            <div class="profile-info">
                                                <div class="avatar">
                                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                                </div>
                                                <div class="details">
                                                    <h3>Supra Oracles 2</h3>
                                                    <p>Php18,000₱–30,000₱ • 10 Applicants • Active</p>
                                                </div>
                                            </div>
                                            <div class="job-dates">
                                                <img src="../Assets/image/bookmark-white 1 original.png " alt="" style="width:17px; height: 17px; background-color:#161D6F; border-radius: 0%; margin:7px;">
                                            </div>
                                        </div>
                                        <div class="job-body">
                                            <div class="info">
                                                <p>
                                                    <strong>Location:</strong>
                                                    Makati
                                                </p>
                                                <p>
                                                    <strong>Years of experience:</strong> 0
                                                </p>
                                            </div>
                                            <div class="skills">
                                                <p><strong>Skills needed:</strong></p>
                                                <span class="skill-tag green">Welder</span>
                                                <span class="skill-tag purple">Electrician</span>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row job-card">
                            <div class="col-sm-12">

                                <div class="card" id="my-offer">
                                    <a href="../BlueCollarWorkerPortal/accepted-bluecollar.php">
                                        <div class="job-header">
                                            <div class="profile-info">
                                                <div class="avatar">
                                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                                </div>
                                                <div class="details">
                                                    <h3>Supra Oracles 3</h3>
                                                    <p>Php18,000₱–30,000₱ • 10 Applicants • Active</p>
                                                </div>
                                            </div>
                                            <div class="job-dates">
                                                <img src="../Assets/image/bookmark-white 1 original.png " alt="" style="width:17px; height: 17px; background-color:#161D6F; border-radius: 0%; margin:7px;">
                                            </div>
                                        </div>
                                        <div class="job-body">
                                            <div class="info">
                                                <p>
                                                    <strong>Location:</strong>
                                                    Makati
                                                </p>
                                                <p>
                                                    <strong>Years of experience:</strong> 0
                                                </p>
                                            </div>
                                            <div class="skills">
                                                <p><strong>Skills needed:</strong></p>
                                                <span class="skill-tag green">Welder</span>
                                                <span class="skill-tag purple">Electrician</span>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-mover">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>

        <script src="../Assets/js/function.js"></script>


    <script>
        document.querySelectorAll('.card-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const type = this.dataset.type;
                const clientId = this.dataset.clientid;


                // Update some text
                document.getElementById('clientid').textContent = clientId;

                // Update image src
                document.getElementById('client_image').src = `scriptsfordb/client_image.php?client_id=${encodeURIComponent(clientId)}`;

                // Hide all views first
                document.getElementById('default_view').style.display = 'none';
                document.getElementById('job_detail_view').style.display = 'none';
                document.getElementById('worker_view').style.display = 'none';



                if (type === 'worker') {
                    // Show worker view only
                    document.getElementById('worker_view').style.display = 'block';

                    // Fill worker view data
                    document.getElementById('worker_name_display').textContent = this.dataset.companyname;
                    document.getElementById('worker_name_display').textContent = this.dataset.companyname;
                    document.getElementById('worker_id_display').textContent = this.dataset.workerid || 'N/A';
                    document.getElementById('worker_location_display').textContent = this.dataset.location;
                    document.getElementById('worker_salary_display').textContent = this.dataset.salary;
                    document.getElementById('worker_email_display').textContent = this.dataset.email;
                    document.getElementById('worker_skills_display').innerHTML = this.dataset.skills;
                    document.getElementById('worker_yoe_display').textContent = this.dataset.yoe + ' years experience';

                } else if (type === 'job' || type === 'other-job') {
                    // Show job detail view only
                    document.getElementById('job_detail_view').style.display = 'block';

                    if (type === 'job') {
                        document.getElementById('job_done_button').style.display = 'block';
                    } else {
                        document.getElementById('job_done_button').style.display = 'none';
                    }

                    // Fill job view data
                    const statusElem = document.getElementById('job_Status');
                    const jobStatusRaw = this.dataset.jobStatus;

                    if (jobStatusRaw) {
                        const isActive = jobStatusRaw === 'Active';
                        statusElem.textContent = jobStatusRaw;
                        statusElem.className = `status-badge ${isActive ? 'active' : 'inactive'}`;
                    } else {
                        console.warn('Missing data-jobStatus on clicked element.');
                        statusElem.textContent = 'Unknown';
                        statusElem.className = 'status-badge inactive';
                    }

                    document.getElementById('company_name_display').textContent = this.dataset.companyname;
                    document.getElementById('date_range_display').textContent = this.dataset.dates;
                    document.getElementById('description_display').textContent = this.dataset.description;
                    document.getElementById('location_display').textContent = this.dataset.location;
                    document.getElementById('salary_display').textContent = this.dataset.salary;
                    document.getElementById('applicants_display').textContent = this.dataset.applied;
                    document.getElementById('email_display').textContent = this.dataset.email;
                    document.getElementById('skills_display').innerHTML = this.dataset.skills;
                    document.getElementById('yoe_display').textContent = this.dataset.yoe + ' years experience';
                }

            });
        });
    </script>


</body>

</html>