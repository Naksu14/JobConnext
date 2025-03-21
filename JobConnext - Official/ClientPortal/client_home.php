<?php
include "../db_con/db_connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['description']) || !isset($_POST['client_id'])) {
        echo "Missing form data!";
        exit;
    }

    $client_id = trim($_POST['client_id']);
    $description = trim($_POST['description']);

    if (empty($description)) {
        echo "Description is required.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO tbl_client_jobpost (client_id, description) VALUES (?, ?)");
    $stmt->bind_param("is", $client_id, $description);


    if ($stmt->execute()) {
        echo "New job record created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<<<<<<< HEAD
 
=======
>>>>>>> aef2f321d4c6c1028a0cdf7a0ec982f589ce6ac4
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

                                        <?php 
                                            $job_offeredQRY = "SELECT * FROM tbl_client_jobpost";
                                            $job_offeredEXE = mysqli_query($conn, $job_offeredQRY);
                                                while ($row = mysqli_fetch_assoc($job_offeredEXE)){

                                                $client_id = $row['client_id'];
                                                $job_salary = $row['salary']; 
                                                $num_applicants = $row['applicants'];
                                                $yr_Exp = $row['year_exp'];
                                                $job_loc = $row['location'];
                                                $date_posted = $row['date_posted'];
                                                $job_offer = $row['job_offer'];

                                                
                                                $job_offered_clientname = "SELECT * FROM tbl_client_information WHERE client_id = $client_id";
                                                $job_ex_offered_name = mysqli_query($conn, $job_offered_clientname);
                                                $getjobdata_offered = mysqli_fetch_assoc($job_ex_offered_name);

                                                $clientoffered_Fname = $getjobdata_offered['firstname'];
                                                $clientoffered_Mname = $getjobdata_offered['middlename'];
                                                $clientoffered_Sname = $getjobdata_offered['lastname'];     
                                                $company_name = $getjobdata_offered['company_name'];

                                                $job_offered_companyname_QRY = "SELECT * FROM tbl_client_information";
                                                $job_offered_companyEXE = mysqli_query($conn, $job_offered_companyname_QRY);
                                                $job_offered_companyGET = mysqli_fetch_assoc($job_offered_companyEXE);

                                                $company_name = $job_offered_companyGET['company_name'];  
                                        ?>                                                                                  
                                               
                                        <?php 
                                            
                                        ?>
                                        <div class="details">
                                            <h3><?php echo $company_name?></h3>
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
                                </div><br>
                                <?php } ?>
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

               <?php $recommended_clientHOMEqry = "SELECT w.* FROM tbl_worker_information w JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id WHERE s.skills = 'Welder'";
                    $recommended_clientHOMEexe= mysqli_query($conn, $recommended_clientHOMEqry);
                        while($recommended_clientGET = mysqli_fetch_assoc(result: $recommended_clientHOMEexe)){
                            $bluecollFnameHOME = $recommended_clientGET['firstname'];
                            $bluecollMnameHOME = $recommended_clientGET['middlename'];
                            $bluecollLnameHOME = $recommended_clientGET['lastname'];  
                            $bluecoll_workerHOME = $recommended_clientGET['worker_id'];
                            
                    $recommended_companynameHOME = "SELECT * FROM tbl_client_information";
                    $recommended_companynameEXE = mysqli_query($conn, $recommended_companynameHOME);
                    $recommended_companynameGET = mysqli_fetch_assoc($recommended_companynameEXE);
                            $bluecoll_companynameHOME = $recommended_companynameGET['company_name'];
                
                ?>

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
                                                <h3><?php echo $bluecollLnameHOME.", ". $bluecollFnameHOME ?></h3>
                                                <p><?php echo "ID: ". $bluecoll_workerHOME ?></p>
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
                <?php } ?>
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
                                        <h3></h3>
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
    </div>
<<<<<<< HEAD

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
                                <input type="number" value="1" min="1" id="applicant-count">
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
=======
        <?php
            include "../ClientPortal/ModalFolder/post_job_modal.php";
        ?>
>>>>>>> aef2f321d4c6c1028a0cdf7a0ec982f589ce6ac4
</body>

</html>