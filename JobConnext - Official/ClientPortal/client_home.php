<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/client_home.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .fullscreen-popup {
            margin: 0;
            border-radius: 5;
            height: 600px;
        }
    </style>
</head>

<body>
    <div class="nav_bar container-fluid text-center">
        <div class="header">
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
    </div>

    <div class="container-fluid custom-container" id="main_content">

        <div class="add_job">
            <div class="dp_photo">
                <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                <input
                    type="text"
                    class="custom-input"
                    placeholder="Post Something..."
                    id="post_something"
                    readonly
                    data-bs-toggle="modal"
                    data-bs-target="#postModal">
            </div>
        </div>

        <div class="worker_details">
            <div class="container" id="inside">
                <div class=" icon1">
                    <img src="../Assets/image/View Detail.png" alt="">
                    <div class="detail_text">
                        <p id="text_gd2">Details</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_content">
            <div class=" row content-header" style="position: sticky; top: 0; z-index: 1; background-color:white; padding: 20px;">
                <div class="col-3">
                    <div class="container-fluid content-filter">
                        <button>
                            <img src="../Assets/image/filter (1) 1.png" alt="">
                            <span>
                                Filter
                            </span>
                        </button>
                    </div>
                </div>

                <div class="col-7">
                    <div class="container-fluid freelance-search">
                        <input type="text" placeholder="  Search for workers..." id="freelance-search">
                    </div>
                </div>
                <div class="col-2">
                    <div class="seek-worker">
                        <button>
                            <span>
                                Seek
                            </span>
                        </button>
                    </div>
                </div>
                <div class="row title-section">
                    <div class="col content-title">
                        <p>
                            Jobs Offered
                        </p>
                    </div>
                </div>





                <div class="row job-card">
                    <div class="col-12">
                        <a href="../ClientPortal/client-showjob.php" class="card-link" style="color: black;">
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
                        </a>
                        <div class="job-footer">
                            <button onclick="showAlert()" style="border: none;">
                                <p>5 Applied</p>
                            </button>
                            <p>0 Accepted</p>
                        </div>
                    </div>
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
                    </div>
                    <div class="row recommended-card">
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
    </div>


    <!-- <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                    <input type="text" class="input-modal" placeholder="Title...">
                    <img src="../Assets/image/iconamoon_exit-light.png" alt="">
                </div>
                <div class="container description-box">
                    <textarea class="form-control" id="form-control-1" rows="3"> Description </textarea>
                </div>
                <div class="container 1st-layer">
                    <div class="job-details">
                        <div class="job-options">
                            <h3>What kind of job do you offer?</h3>
                            <div class="job-offer-options">
                                <button class="job-option construction">Construction</button>
                                <button class="job-option cleaning">Cleaning</button>
                            </div>
                            <div class="others">
                                <label for="others" style="margin-top:13px;">Others:</label>
                                <input type="text" id="others" placeholder="Enter job type">
                                <button class="add-button">Add</button>
                            </div>
                            <div class="added-jobs">
                                <span class="added">Added:</span>
                                <span class="added-job welder">Welder</span>
                                <span class="added-job electrician">Electrician</span>
                            </div>
                            <div class="salary-range">
                                <label>Salary Range:</label>
                                <p>₱_______ - ₱_______</p>
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
                            <textarea placeholder="Makati"></textarea>
                            <div class="applicants-needed">
                                <label>How many applicants do you need?</label>
                                <input type="number" value="10" min="1" id="applicant-count">
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
                    <button class="edit-button">Edit</button>
                </div>
            </div>
        </div>
    </div> -->
    </div>

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
                     <div class="modal-header">
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                    <input type="text" class="input-modal" placeholder="Title...">
                </div>
                <div class="container description-box">
                    <textarea class="form-control" id="form-control-1" rows="3"> Description </textarea>
                </div>
                <div class="container 1st-layer">
                    <div class="job-details">
                        <div class="job-options">
                            <h3>What kind of job do you offer?</h3>
                            <div class="job-offer-options">
                                <button class="job-option construction">Construction</button>
                                <button class="job-option cleaning">Cleaning</button>
                            </div>
                            <div class="others">
                                <label for="others" style="margin-top:13px;">Others:</label>
                                <input type="text" id="others" placeholder="Enter job type">
                                <button class="add-button">Add</button>
                            </div>
                            <div class="added-jobs">
                                <span class="added">Added:</span>
                                <span class="added-job welder">Welder</span>
                                <span class="added-job electrician">Electrician</span>
                            </div>
                            <div class="salary-range">
                                <label>Salary Range:</label>
                                <input type="number" value="0" min="1" placeholder="Salary range" id="range">
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
                            <textarea placeholder="Makati"></textarea>
                            <div class="applicants-needed">
                                <label>How many applicants do you need?</label>
                                <input type="number" value="10" min="1" id="applicant-count">
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
                `,
                width: '50%',
                showCloseButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Post',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#161D6F'
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>