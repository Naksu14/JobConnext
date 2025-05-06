<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Modal</title>

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

</body>

</html>