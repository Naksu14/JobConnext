<?php
// job_post_modal.php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Modal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .fullscreen-popup {
            margin: 0;
            border-radius: 5;
            height: 600px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../ClientPortal/ModalFolder/post_job_modal.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showAlert() {
            Swal.fire({
                width: '1000px',
                html: `
            <div class="d-flex flex-row justify-content-center align-items-start" style="height: 600px;">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-start">
                        <h1 class="me-3">Application status</h1>
                        <select>
                            <option>pending</option>
                            <option>accepted</option>
                            <option>rejected</option>
                        </select>
                    </div>
                    <br>
                    
                    <p>no application yet</p>
                </div>
                <div class="flex-grow-1 d-flex flex-column justify-content-center align-items-center h-100">
                   <div class="d-flex flex-column">
                        <img src="../Assets/image/application_default.png" alt="yeet" style="height: 300px; width: 300px;">
                        <p>click view resume to show the information</p>
                   </div>
                </div>
            </div>
        `,
                showCloseButton: true,
                showConfirmButton: false, // Hides the button
            });
        }
    </script>

    <script>
        document.getElementById('post_something').addEventListener('click', () => {
            Swal.fire({
                title: 'Post a Job',
                html: `
                    <form id="job-posting-form" method="POST" action="../ClientPortal/create_jobpost.php">
                     <div class="modal-header">
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                    <input type="text" class="input-modal" placeholder="Title...">
                </div>
                <div class="container description-box">
                    <textarea class="form-control" id="form-control-1" rows="3" placeholder="Enter description"></textarea>

                </div>
                <div class="container 1st-layer">
                    <div class="job-details">
                        <div class="job-options">
                            <h3>What kind of job do you offer?</h3>
                            <div class="job-offer-options">
                            <label>Enter Job Title:</label>
                            <input type="text" id="job-title" placeholder="Add the title you are hiring for">
                            </div>
                            <div class="salary-range">
                                <label>Salary Range:</label>
                                <input type="number" 
                                 min="300" placeholder="Range Start" id="range">
                                <label>-</label>
                                <input type="number" min="300" placeholder="Range End" id="range">
                            </div>
                            <div class="file-attachments">
                                <label>File Attachment/s:</label>

                                <p><img src="../Assets/image/material-symbols_image-outline.png" alt="">No File Attach</p>
                                <p><img src="../Assets/image/mdi_file-outline.png" alt="">No File Attach</p>
                            </div>
                        </div>
                        <div class="job-status">
                            <h3>Job Status: <span class="active">Active</span></h3>
                            <label>Location:</label>
                            <textarea placeholder="Enter Location"></textarea>
                            <div class="applicants-needed">
                                <label>How many applicants do you need?</label>
                                <input type="number" value="0" min="1" id="applicant-count">
                            </div>
                            <div class="experience">
                                <label>Year of experience:</label>
                                <input type="number" value="0" min="0" id="applicant-count">
                            </div>
                            <div class="deadline">
                                <label>Job offer deadline:</label>
                                <input type="date" value="00/00/0000" id="date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </form>
                `,
                width: '50%',
                showCloseButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Post',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#161D6F',

                preConfirm: () => {
                    let description = document.getElementById("form-control-1").value.trim();

                    if (!description) {
                        Swal.showValidationMessage("Description is required!");
                        return false;
                    }

                    let clientId = 2001;

                    return fetch('client_home.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `description=${encodeURIComponent(description)}&client_id=${clientId}`
                        })
                        .then(response => response.text()) // Parse response as tex
                        .catch(error => {
                            Swal.showValidationMessage("Request failed: " + error);
                        });
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>