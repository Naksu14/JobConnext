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
                        My Job Offer
                    </p>
                </div>
            </div>
            <div class="offer-area">
                <div class="row job-card">
                    <div class="col-sm-12">

                        <div class="card" id="my-offer">
                            <a href="../BlueCollarWorkerPortal/blue-collar-showjob.php">
                                <div class="job-header">
                                    <div class="profile-info">
                                        <div class="avatar">
                                            <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                        </div>
                                        <div class="details">
                                            <h3>Supra Oracles</h3>
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
                    <div class="col-sm-12">

                        <div class="card" id="my-offer">
                            <a href="../BlueCollarWorkerPortal/accepted-bluecollar.php">
                                <div class="job-header">
                                    <div class="profile-info">
                                        <div class="avatar">
                                            <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                        </div>
                                        <div class="details">
                                            <h3>Supra Oracles Accepted</h3>
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
                    <div class="col-sm-12">
                        <div class="card" id="my-offer">
                            <a href="../BlueCollarWorkerPortal/rejected-bluecollar.php">
                                <div class="job-header">
                                    <div class="profile-info">
                                        <div class="avatar">
                                            <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                        </div>
                                        <div class="details">
                                            <h3>Supra Oracles Rejected</h3>
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
                            </a>
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