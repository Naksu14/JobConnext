<?php
session_start();
include '../db_con/db_connection.php';


$user_id = $_SESSION['client_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Home</title>

    <script>
        window.sessionData = {
            user_id: <?php echo json_encode($user_id); ?>
        };
    </script>

    <script src="../Assets/js/fetchData.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- External Css -->
    <link rel="stylesheet" href="../Assets/css/postCard_and_view.css">
    <link rel="stylesheet" href="../Assets/css/Client Css/client_home.css">
    <link rel="stylesheet" href="../Assets/css/style.css">

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
    <!-- For Navigation bar include -->
    <?php include "../ClientPortal/components/navbar.php" ?>

    <div class="container-fluid custom-container" id="main_content">
        <?php include "../ClientPortal/components/postBar.php" ?>

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
                                <span id="clientid"></span>
                            </div>
                            <div class="detail-view  position-relative">
                                <span id="job_Status" class="position-absolute top-0 end-0 me-2 mt-2 badge bg-success">Active</span>
                                <h3 id="company_name_display">Company Name</h3>
                                <p id="date_range_display">Date Range</p>
                                <p id="description_display">Job Description</p>
                            </div>

                        </div>
                    </div>

                    <div class="short-info-container">
                        <div class="short-info">
    <i class="bi bi-briefcase-fill"></i> <!-- Job Offer -->
    <p id="job_offer_display">Job Offer</p>
</div>
<div class="short-info">
    <i class="bi bi-geo-alt-fill"></i> <!-- Location -->
    <p id="location_display">Location</p>
</div>
<div class="short-info">
    <i class="bi bi-currency-dollar"></i> <!-- Salary -->
    <p id="salary_display">Salary</p>
</div>
<div class="short-info">
    <i class="bi bi-people-fill"></i> <!-- Applicants -->
    <p id="applicants_display" onclick="showAlert()">Applicants</p>
</div>
<div class="short-info">
    <i class="bi bi-envelope-fill"></i> <!-- Email -->
    <p id="email_display">Email</p>
</div>

                    </div>
                    <div class="skills-worker-details">
                        <p>Other Details</p>
                    </div>
                    <button id="yourTargetButton">
                        <i class="bi bi-eye"></i> View Attachment
                    </button>

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
                    <hr>
                    <div style="text-align: center;">
                        <span id="job_status" style="color: #2774d8; font-weight: bold; display: none;"></span>
                    </div><br>

                    <div class="job-done" id="job_done_buttonCompleted" style="display: none;">
                        <button id="job_Complete">Job Completed</button>
                    </div>

                    <div class="job-done" id="job_done_buttonApplicants" style="display: none;">
                        <button id="complete_Applicants">Complete Applicants</button>
                    </div>
                    <div class="rating-content" id="rate-content" style="display: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="rate-content-title">Worker's Rate</span>
                            <button class="rate-worker-btn" id="rate-worker-btn">Rate Worker</button>
                        </div>
                        <div style="text-align: center; margin-top: 20px;">Rating Content</div>
                    </div>
                    
                    <br>



                </div>

                <!-- Worker View -->
                <div class="worker-view" id="worker_view" style="display: none;">
                    <!-- Header Section -->
                    <div class="job-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img id="worker_image" src="" alt="Worker Image">
                                <span id="workerid"></span>
                            </div>
                            <div class="details">
                                <h3 id="worker_name_display">Worker Name </h3>
                                <p>Worker ID: <span id="worker_id_display"></span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact & Personal Info -->
                    <div class="short-info-container">
                        <div class="short-info">
                            <i class="bi bi-telephone-fill"></i>
                            <p id="worker_phone_display">Phone Number</p>
                        </div>
                        <div class="short-info">
                            <i class="bi bi-envelope-fill"></i>
                            <p id="worker_email_display">Email</p>
                        </div>
                        <div class="short-info">
                            <i class="bi bi-cash-stack"></i>
                            <p id="worker_salary_display">Expected Salary</p>
                        </div>
                        <div class="short-info">
                            <i class="bi bi-geo-alt-fill"></i>
                            <p id="worker_location_display">Location</p>
                        </div>
                    </div>

                    <!-- Bio Section -->
                    <div class="bio-section">
                        <div class="short-info">
                            <i class="bi bi-person-lines-fill"></i>
                            <p><strong>Bio: </strong><br> <span id="worker_bio_display"></span></p>
                        </div>
                    </div><br>

                    <!-- Skills Section -->
                    <div class="skills-worker-details">
                        <p><strong>Skills</strong></p>
                    </div>
                    <div class="skills-available-details" id="worker_skills_display"></div><br>

                    <!-- Experience -->
                    <div class="no-ex">
                        <p><strong>Experience</strong></p>
                        <p id="worker_yoe_display">Years of experience</p>
                    </div>
                </div>




            </div>
        </div>

        <div class="page_content">
            <div class=" row content-header" style=" padding: 20px;">
                <div class="row job-card">
                    <div class="col-12 justify-content-end">
                        <div class="container-fluid content-filter">
                            <div class="d-flex justify-content-between align-items-center w-100">

                                <!-- Title: Left Side -->
                                <div class="content-title title-section"">
                                    <p class=" mb-0">Jobs Offered</p>
                                </div>

                                <!-- Filter: Right Side -->
                                <div>
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="../Assets/image/filter (1) 1.png" alt="">
                                        <span>Filter</span>
                                    </button>
                                    <ul class="dropdown-menu p-2" aria-labelledby="filterDropdown" style="min-width: 200px;">
                                        <li><a class="dropdown-item" href="#" data-filter="date_desc">Newest</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="date_asc">Oldest</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="active">Active</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="ongiong">Ongoing</a></li>
                                        <li><a class="dropdown-item" href="#" data-filter="inactive">Inactive</a></li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="jobCardsContainer">
                            <?php include '../ClientPortal/template/tmplt_job_offered.php'; ?>
                        </div>
                    </div>
                    <?php include '../ClientPortal/ModalFolder/rate_WorkerModal.php'; ?>
                </div>

                <div class="row job-card">
                    <div class="col-12 justify-content-end">
                        <div class="container-fluid content-filter">
                            <div class="d-flex justify-content-between align-items-center w-100">

                                <!-- Title: Left Side -->
                                <div class="content-title title-section">
                                    <p class="mb-0">Recommended Worker's</p>
                                </div>

                                <!-- Filter: Right Side -->
                                <div>
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdowns" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="../Assets/image/filter (1) 1.png" alt="">
                                        <span>Filter</span>
                                    </button>
                                    <ul class="dropdown-menu p-2" aria-labelledby="filterDropdowns" style="min-width: 200px;">
                                        <li><a class="dropdown-items" href="#" data-filters="date_desc">Newest</a></li>
                                        <li><a class="dropdown-items" href="#" data-filters="date_asc">Oldest</a></li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div><br>
                    <div class="col-12">
                        <div id="workerCardsContainer">
                            <?php include '../ClientPortal/template/tmplt_recommended_worker.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="row job-card">
                    <div class="col-12 justify-content-end">
                        <div class="container-fluid content-filter">
                            <div class="d-flex justify-content-between align-items-center w-100">

                                <!-- Title: Left Side -->
                                <div class="content-title title-section"">
                                    <p class=" mb-0">Other Jobs Offer</p>
                                </div>

                                <!-- Filter: Right Side -->
                                <div>
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdownothers" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="../Assets/image/filter (1) 1.png" alt="">
                                        <span>Filter</span>
                                    </button>
                                    <ul class="dropdown-menu p-2" aria-labelledby="filterDropdownothers" style="min-width: 200px;">
                                        <li><a class="dropdown-itemothers" href="#" data-filterothers="date_desc">Newest</a></li>
                                        <li><a class="dropdown-itemothers" href="#" data-filterothers="date_asc">Oldest</a></li>
                                        <li><a class="dropdown-itemothers" href="#" data-filterothers="active">Active</a></li>
                                        <li><a class="dropdown-itemothers" href="#" data-filterothers="ongiong">Ongoing</a></li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="otherJobCardsContainer">
                            <?php include '../ClientPortal/template/tmplt_other_job_offered.php'; ?>
                        </div>
                        
                    </div>
                </div>

                <div id="noResultsMessage">
                    No results found.
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="../Assets/js/card_viewlink.js"></script>
    <!-- <div class="col-9 d-flex justify-content-end">
                    <div class="container-fluid content-filter">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../Assets/image/filter (1) 1.png" alt="">
                            <span>Filter</span>
                        </button>
                        <ul class="dropdown-menu p-2" aria-labelledby="filterDropdown" style="min-width: 200px;">
                            <li><a class="dropdown-item" href="#" data-filter="all">All</a></li>
                            <li><a class="dropdown-item" href="#" data-filter="Electrician">Electrician</a></li>
                            <li><a class="dropdown-item" href="#" data-filter="Tubero">Tubero</a></li>
                            <li>
                                <div class="dropdown-item-text">
                                    <label class="form-label small mb-1">Other:</label>
                                    <input type="text" id="customFilterInput" class="form-control form-control-sm" placeholder="Enter job type">
                                    <button class="btn btn-sm btn-primary mt-2 w-100" id="applyCustomFilter">Apply</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->

    <!-- <script src="../Assets/js/filter.js"></script> -->
    <script src="../Assets/js/card_editOrdelete.js"></script>
    <script src="../Assets/js/logout.js"></script>
    <script src="../Assets/js/report.js"></script>
    

</body>

</html>