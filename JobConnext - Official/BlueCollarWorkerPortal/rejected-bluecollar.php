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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Source+Code+Pro:wght@200..900&family=Montserrat:wght@100..900&display=swap"
        rel="stylesheet">
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

    <?php include "../BlueCollarWorkerPortal/components/navbar.php" ?>

    <div class="container-fluid custom-container" id="main_content">
        <div class="header-details">
            <div class="header-container">
                <h2>
                    Are you looking for a Freelance job?
                </h2>
            </div>
            <div class="header-content">
                <h6>
                    JOBCONNEXT is a place where you can find a freelance job in a various skill more than 10,000
                    freelance jobs are available here
                </h6>
            </div>
        </div>

        <div class="worker_details">
            <div class="container">
                <!-- Default view -->
                <div class="default-view" id="default_view">
                    <img src="../Assets/image/View Detail.png" alt="">
                    <div class="detail_text">
                        <p id="text_gd2">Details</p>
                    </div>
                </div>
                <!-- Selected job detail view -->
                <div class="job-detail-view" id="job_detail_view" style="display: none;">
                    <div class="job-header">
                        <div class="profile-info">
                            <div class="avatar-display">
                                <img id="client_image" src="" alt="Client Image">
                                <span id="clientid" class="d-none"></span>
                            </div>
                            <div class="detail-view  position-relative">
                                <span id="job_Status" class="position-absolute top-0 end-0 me-2 mt-2 badge bg-success">Active</span>
                                <h3 id="company_name_display">Company Name</h3>
                                <p id="date_range_display">Date Range</p>
                                <p id="description_display">Job Description</p>
                            </div>

                        </div>
                        <button id="view-attach-file"></button>
                    </div>

                    <div class="short-info-container">
                        <div class="short-info"><img src="../Assets/image/Location.png" alt="">
                            <p id="location_display">Location</p>
                        </div>
                        <div class="short-info"><img src="../Assets/image/Stack of Money.png" alt="">
                            <p id="salary_display">Salary</p>
                        </div>
                        <div class="short-info"><img src="../Assets/image/Applicant.png" alt="">
                            <p id="applicants_display" onclick="showAlert()">Applicants</p>
                        </div>
                        <div class="short-info"><img src="../Assets/image/ic_outline-email.png" alt="">
                            <p id="email_display">Email</p>
                        </div>
                    </div>

                    <!-- <button id="yourTargetButton">Submit</button> -->

                    <div class="skills-worker-details">
                        <p>Qualifications and Skills</p>
                    </div>
                    <div class="skills-available-details" id="skills_display"></div>

                    <div class="no-ex">
                        <p id="yoe_display">Year of experience</p>
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
                    <div class="applyJob" id="job_done_button"">
                        <button>
                            Apply Job
                        </button>
                    </div>

                </div>
                <!-- worker view -->
                <div class=" worker-view" id="worker_view" style="display: none;">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img id="worker_avatar" src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                </div>
                                <div class="details">
                                    <h3 id="worker_name_display">Worker Name</h3>
                                    <p id="worker_id_display">Worker ID</p>
                                </div>
                            </div>
                        </div>

                        <div class="short-info-container">
                            <div class="short-info"><img src="../Assets/image/Location.png" alt="">
                                <p id="worker_location_display">Location</p>
                            </div>
                            <div class="short-info"><img src="../Assets/image/Stack of Money.png" alt="">
                                <p id="worker_salary_display">Expected Salary</p>
                            </div>
                            <div class="short-info"><img src="../Assets/image/ic_outline-email.png" alt="">
                                <p id="worker_email_display">Email</p>
                            </div>
                        </div>

                        <div class="skills-worker-details">
                            <p>Skills</p>
                        </div>
                        <div class="skills-available-details" id="worker_skills_display"></div>

                        <div class="no-ex">
                            <p id="worker_yoe_display">Year of experience</p>
                        </div>
                    </div>


                </div>
            </div>

            <div class="page_content">
                <div class=" row content-header" style="position: sticky; top: 0; z-index: 1; background-color:white; padding: 20px;">
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
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>





                    <script src="../Assets/js/function.js"></script>


                    <script>
                        document.querySelectorAll('.card-link').forEach(link => {
                            link.addEventListener('click', function(e) {
                                e.preventDefault();

                                const type = this.dataset.type;
                                const clientId = this.dataset.clientid;
                                const jobid = this.dataset.jobid;

                                const targetButton = document.querySelector('#yourTargetButton');
                                if (targetButton) {
                                    targetButton.dataset.clientid = clientId;
                                    targetButton.dataset.jobid = jobid; // use a separate attribute
                                }



                                // Update some text
                                document.getElementById('clientid').textContent = clientId;

                                // Update image src
                                document.getElementById('client_image').src = `../ClientPortal/scriptsfordb/client_image.php?client_id=${encodeURIComponent(clientId)}`;

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


                        document.querySelector('#yourTargetButton').addEventListener('click', function() {
                            const clientId = this.dataset.clientid;
                            const jobId = this.dataset.jobid;

                            console.log('Sending request with:', clientId, jobId);

                            fetch(`scriptsfordb/get_file.php?client_id=${clientId}&job_id=${jobId}`)
                                .then(response => {
                                    console.log('HTTP status:', response.status);
                                    if (!response.ok) {
                                        throw new Error(`HTTP error! Status: ${response.status}`);
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    console.log('Response data:', data);

                                    if (data.success && data.filepath) {
                                        window.open(data.filepath, '_blank');
                                    } else {
                                        alert(data.message || 'File not found.');
                                    }
                                })
                                .catch(err => {
                                    console.error('Fetch error:', err);
                                    alert('An error occurred while fetching the file.');
                                });
                        });
                    </script>




</body>

</html>