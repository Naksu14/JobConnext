<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/client_rate-worker.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Source+Code+Pro:wght@200..900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Assets/css/style.css">    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<?php include "../ClientPortal/components/navbar.php"?>

    <div class="container-fluid custom-container" id="main_content">
        <div class="add_job">
            <div class="dp_photo">
                <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                <input type="text" class="custom-input" placeholder="Post Something..." id="post_something">
            </div>
        </div>

        <div class="container worker_details">
            <div class="container worker_detail_header">
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

                    <div class="check-menu">
                        <img src="../Assets/image/material-symbols_check.png" alt="">
                    </div>
                </div>
                <div class="short-info-container">
                    <div class="short-info">
                        <img src="../Assets/image/Location.png" alt="">
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
                <div class="worker_rate">
                    <div class="card" id="my-offer">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg"
                                        alt="Avatar">
                                </div>
                                <div class="details-client">
                                    <div class="feedback-header">
                                        <h3>Maxwell Cruz</h3>
                                        <div class="star-rating">
                                            <span class="star" data-value="1">★</span>
                                            <span class="star" data-value="2">★</span>
                                            <span class="star" data-value="3">★</span>
                                            <span class="star" data-value="4">★</span>
                                            <span class="star" data-value="5">★</span>
                                            <p>5.0</p>
                                        </div>
                                        <div class="report-menu">
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reportModal"
                                                onclick="showAlert()">
                                                Report
                                            </button>
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
                        <div class="rate">
                            <a href="">
                                Rate worker
                            </a>
                        </div>
                    </div>
                    <!-- <div class="card" id="my-offer">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg"
                                        alt="Avatar">
                                </div>
                                <div class="details-client">
                                    <div class="feedback-header">
                                        <h3>Maxwell Cruz</h3>
                                        <div class="star-rating">
                                            <span class="star" data-value="1">★</span>
                                            <span class="star" data-value="2">★</span>
                                            <span class="star" data-value="3">★</span>
                                            <span class="star" data-value="4">★</span>
                                            <span class="star" data-value="5">★</span>
                                            <p>5.0</p>
                                        </div>
                                        <div class="report-menu">
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reportModal">
                                                Report
                                            </button>
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
                        <div class="rate">
                            <a href="">
                                Rate worker
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="card" id="my-offer">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg"
                                        alt="Avatar">
                                </div>
                                <div class="details-client">
                                    <div class="feedback-header">
                                        <h3>Maxwell Cruz</h3>
                                        <div class="star-rating">
                                            <span class="star" data-value="1">★</span>
                                            <span class="star" data-value="2">★</span>
                                            <span class="star" data-value="3">★</span>
                                            <span class="star" data-value="4">★</span>
                                            <span class="star" data-value="5">★</span>
                                            <p>5.0</p>
                                        </div>
                                        <div class="report-menu">
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reportModal">
                                                Report
                                            </button>
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
                        <div class="rate">
                            <a href="">
                                Rate worker
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reportModalLabel" onclick="showAlert()">Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Reasons for reporting</h6>
                        <div class="reason-buttons">
                            <button id="reasons">Fraud or scam</button>
                            <button id="reasons">Misinformation</button>
                            <button id="reasons-l">Threat or Violence</button>
                            <button id="reasons">Self-harm</button>
                            <button id="reasons-l">Dangerous or extremist worker</button>
                            <button id="reasons">Hateful Speech</button>
                            <button id="reasons">Others</button>
                        </div>
                        <div class="message-report">Message Report ⚠️</div>
                        <textarea class="message-box form-control" placeholder="Describe your issue..."></textarea>
                        <div class="button-proof">
                            <button id="upload-proof" data-bs-toggle="modal" data-bs-target="#uploadproof">Upload Proof</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="uploadproof" tabindex="-1" aria-labelledby="uploadproof" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadproof">Upload Proof</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container-fluid upload-border">
                        <div class="container upload-container">
                            <img src="../Assets/image/Vector1.png" alt="">
                            <span>Drag and Drop a file here or Choose a File</span>
                        </div>
                    </div>
                    <div class="modal-body" id="upload-modal">
                        <div class="req">
                            <p>Supported Format: PDF, JPEG,MP4,MP3</p>
                            <p>Maximum size: 25MB</p>
                        </div>
                        <div class="upload-info">
                            <div class="upload-inf-head">
                                <img src="../Assets/image/Vector.png" alt="">
                                <div class="file-info">
                                    <span>
                                        Video ng report.mp4
                                    </span>
                                    <span style="font-weight: bold; margin-top:0px">
                                        Size: 15MB
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="margin-top:20px">
                            <div class="progress-bar w-75"></div>
                        </div>
                        <div class="buttons-modal">
                            <button id="cancel-butt">
                                Cancel
                            </button>
                            <button id="submit-butt">
                                Submit Report!
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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
                        My Job Offer
                    </p>
                </div>
            </div>

            <div class="row job-card">
                <div class="col-sm-12">
                    <a href="../ClientPortal/client-showjob.php" class="card-link">
                        <div class="card" id="my-offer">
                            <div class="job-header">
                                <div class="profile-info">
                                    <div class="avatar">
                                        <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                    </div>
                                    <div class="details">
                                        <h3>Mr. Fixer</h3>
                                        <p>Php18,000₱–30,000₱ • 10 Applicants • Active</p>
                                    </div>
                                </div>
                                <div class="job-dates">
                                    <div class="menu">•••</div>
                                    <p>11/8/2024 to 11/13/2024</p>
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
                            <div class="job-footer">
                                <p>5 Applied</p>
                                <p>0 Accepted</p>
                            </div>
                        </div>
                </div>
                </a>
            </div>

            <div class="row title-section">
                <div class="col-sm recommend-workers">
                    <p>
                        Recommended workers
                    </p>
                </div>
            </div>

            <div class="container-fluid recommendation">
                <div class="row recommended-card">
                    <div class="col-12">
                        <a href="worker_recommended.php" class="card-link">
                            <div class="card" id="my-offer">
                                <div class="job-header">
                                    <div class="profile-info">
                                        <div class="avatar">
                                            <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                        </div>
                                        <div class="details">
                                            <h3>Maxwell Cruz</h3>
                                            <p>ID:3424675</p>
                                        </div>
                                    </div>
                                    <div class="menu">
                                        •••
                                    </div>
                                </div>
                                <div class="skills">
                                    <p><strong>Skills:</strong></p>
                                    <span class="skill-tag green">Welder</span>
                                    <span class="skill-tag purple">Electrician</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- <div class="row recommended-card">
                    <div class="col-lg-12">
                        <div class="card" id="my-offer">
                            <div class="job-header">
                                <div class="profile-info">
                                    <div class="avatar">
                                        <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                    </div>
                                    <div class="details">
                                        <h3>Alex Stark </h3>
                                        <p>ID:3407955</p>
                                    </div>
                                </div>
                                <div class="job-dates">
                                    <div class="menu">•••</div>
                                </div>
                            </div>
                            <div class="skills">
                                <p><strong>Skills:</strong></p>
                                <span class="skill-tag green">Welder</span>
                                <span class="skill-tag purple">Electrician</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row recommended-card">
                    <div class="col-12">
                        <div class="card" id="my-offer">
                            <div class="job-header">
                                <div class="profile-info">
                                    <div class="avatar">
                                        <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                    </div>
                                    <div class="details">
                                        <h3>Joseph Vergara</h3>
                                        <p>ID:3824155</p>
                                    </div>
                                </div>
                                <div class="job-dates">
                                    <div class="menu">•••</div>
                                </div>
                            </div>
                            <div class="skills">
                                <p><strong>Skills:</strong></p>
                                <span class="skill-tag green">Welder</span>
                                <span class="skill-tag purple">Electrician</span>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row title-section">
                    <div class="col other-offers">
                        <p>
                            Other Job Offers
                        </p>
                    </div>
                </div>
            </div>

            <div class="row other-offer">
                <div class="col-12">
                    <div class="card" id="my-offer">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                </div>
                                <div class="details">
                                    <h3>Highway express</h3>
                                    <p>Php7,000₱-8,000₱• 5 Applicants • Active</p>
                                </div>
                            </div>
                            <div class="job-dates">
                                <div class="menu">•••</div>
                                <p>11/8/2024 to 11/13/2024</p>
                            </div>
                        </div>
                        <div class="job-body">
                            <div class="info">
                                <p>
                                    <strong>Location:</strong>
                                    Taguig
                                </p>
                                <p>
                                    <strong>Years of experience:</strong> 2
                                </p>
                            </div>
                            <div class="skills">
                                <p><strong>Skills needed:</strong></p>
                                <span class="skill-tag yellow">Truck Driver</span>
                            </div>
                        </div>
                        <div class="job-footer">
                            <p>5 Applied</p>
                            <p>0 Accepted</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        document.querySelectorAll(".button").forEach(button => {
            button.addEventListener("click", function() {
                document.querySelectorAll(".button").forEach(btn => btn.classList.remove("selected"));
                this.classList.add("selected");
            });
        });
    </script>
    <script>
        function showAlert() {
            Swal.fire({
                title: 'Report',
                html: `
            <h6 style="color:red">Reasons for reporting</h6>
            <div class="reason-buttons">
                 <button id="reasons">Fraud or scam</button>
                            <button id="reasons">Misinformation</button>
                            <button id="reasons-l">Threat or Violence</button>
                            <button id="reasons">Self-harm</button>
                            <button id="reasons-l">Dangerous or extremist worker</button>
                            <button id="reasons">Hateful Speech</button>
                            <button id="reasons">Others</button>
            </div>
            <div class="message-report">Message Report ⚠️</div>
            <textarea class="message-box form-control" placeholder="Describe your issue..."></textarea>
        `,
                showCancelButton: true,
                confirmButtonText: 'Next: Upload Proof',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#161D6F',
                width: '45%'
            }).then((result) => {
                if (result.isConfirmed) {
                    showUploadModal(); // Call the upload modal function
                }
            });
        }

        function showUploadModal() {
            Swal.fire({
                title: 'Upload Proof',
                html: `
            <div class="container-fluid upload-border">
                <div class="container upload-container">
                    <img src="../Assets/image/Vector1.png" alt="">
                    <span>Drag and Drop a file here or Choose a File</span>
                </div>
            </div>
            <div class="modal-body" id="upload-modal">
                <div class="req">
                    <p>Supported Format: PDF, JPEG, MP4, MP3</p>
                    <p>Maximum size: 25MB</p>
                </div>
                <div class="upload-info">
                    <div class="upload-inf-head">
                        <img src="../Assets/image/Vector.png" alt="">
                        <div class="file-info">
                            <span>Video ng report.mp4</span>
                            <span style="font-weight: bold; margin-top:0px">Size: 15MB</span>
                        </div>
                    </div>
                </div>
                <div class="progress" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="margin-top:20px">
                    <div class="progress-bar w-75"></div>
                </div>
            </div>
        `,
                showCancelButton: true,
                confirmButtonText: 'Submit Report!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#161D6F',
                width: '45%'
            }).then((result) => {
                if (result.isConfirmed) {
                    showFinalMessage(); // Call the final message
                }
            });
        }

        function showFinalMessage() {
            Swal.fire({
                title: 'Report Submitted!',
                text: 'Thank you for reporting. We will review your submission.',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#161D6F'
            });
        }

        // Trigger report modal on button click
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("reportButton").addEventListener("click", showReportModal);
        });
    </script>


    <script src="client-rate.js">

    </script>
</body>

</html>