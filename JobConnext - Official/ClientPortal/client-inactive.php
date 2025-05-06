<?php
    session_start();
    include '../db_con/db_connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/client-inactive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Source+Code+Pro:wght@200..900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
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

                    <div class="inactive-menu">
                        <a href="../ClientPortal/client-showjob.php">
                            <button>
                                Inactive
                            </button>
                        </a>
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
                    <div class="job-done">
                        <a href="../ClientPortal/client_rate-workers.php">
                            <button>
                                Task Completed
                            </button>
                        </a>
                    </div>
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


            <?php
            
            $job_offerqry = "SELECT * FROM tbl_client_jobpost";
            $jobEXoffer = mysqli_query($conn, $job_offerqry);
                while ($jobGetdata = mysqli_fetch_assoc($jobEXoffer)){

                $client_id = $jobGetdata['client_id'];
                $job_salary = $jobGetdata['salary']; 
                $num_applicants = $jobGetdata['applicants'];
                $yr_Exp = $jobGetdata['year_exp'];
                $job_loc = $jobGetdata['location'];
                $date_posted = $jobGetdata['date_posted'];
                $job_offer = $jobGetdata['job_offer'];

                $job_offer_clientname = "SELECT * FROM tbl_client_information WHERE client_id = '$client_id'";
                $job_ex_offer_name = mysqli_query($conn, $job_offer_clientname);
                $getjobdata = mysqli_fetch_assoc($job_ex_offer_name);

                $clientFname = $getjobdata['firstname'];
                $clientMname = $getjobdata['middlename'];
                $clientSname = $getjobdata['lastname'];     
            
            ?>
            <div class="row job-card">
                <div class="col-sm-12">
                    <a href="" class="card-link">
                        <div class="card" id="my-offer">
                            <div class="job-header">
                                <div class="profile-info">

                                
                                   
                            

                                    <div class="avatar">
                                        <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                    </div>
                                    <div class="details">
                                        <h3><?php echo $job_offer?></h3>
                                        <p><?php echo $job_salary. "₱"." "."•"." ". $num_applicants." "."Applicants" ?></p>
                                    </div>
                                </div>
                                <div class="job-dates">
                                    <div class="menu">•••</div>
                                    <p><?php echo $date_posted ?></p>
                                </div>
                            </div>
                            <div class="job-body">
                                <div class="info">
                                    <p>
                                        <strong>Location:</strong>
                                        <?php echo $job_loc ?>
                                    </p>
                                    <p>
                                        <strong><?php echo "Years of experience: ". $yr_Exp ?></strong> 
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
                <br>
            </div>
            <?php }?>

            <div class="row title-section">
                <div class="col-sm recommend-workers">
                    <p>
                        Recommended workers
                    </p>
                </div>
            </div>
                    

            <?php 
                $reco_qry = "SELECT w.* FROM tbl_worker_information w JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id WHERE s.skills = 'Welder';";
                $reco_qryex = mysqli_query($conn, $reco_qry);
                    while($get_skill = mysqli_fetch_assoc($reco_qryex)){
                        
                    $bluecollFname = $get_skill['firstname'];
                    $bluecollMname = $get_skill['middlename'];
                    $bluecollLname = $get_skill['lastname'];  
                    $bluecoll_workerID = $get_skill['worker_id'];  
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
                                            <h3><?php echo $bluecollLname. $bluecollFname. $bluecollMname?></h3>
                                            <p><?php echo "ID: ".$bluecoll_workerID ?></p>
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


            <?php 
                $recomend_job_offersQRY = "SELECT tbl_client_information.*, tbl_client_jobpost.* FROM tbl_client_information JOIN tbl_client_jobpost ON tbl_client_information.client_id = tbl_client_jobpost.client_id";
                $recomend_job_offersEX = mysqli_query($conn, $recomend_job_offersQRY);
                $recommend_jobGET = mysqli_fetch_assoc($recomend_job_offersEX);
                    $clientFnameRECOMMEND = $recommend_jobGET['firstname'];
                    $clientMnameRECOMMEND = $recommend_jobGET['middlename'];
                    $clientLnameRECOMMEND = $recommend_jobGET['lastname'];
                    $client_id = $recommend_jobGET['client_id'];
                    $job_salary = $recommend_jobGET['salary']; 
                    $num_applicants = $recommend_jobGET['applicants'];
                    $yr_Exp = $recommend_jobGET['year_exp'];
                    $job_loc = $recommend_jobGET['location'];
                    $date_posted = $recommend_jobGET['date_posted'];
                    $job_offer_recommend = $recommend_jobGET['job_offer'];
            
            ?>
            <div class="row other-offer">
                <div class="col-12">
                    <div class="card" id="my-offer">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                </div>
                                <div class="details">
                                    <h3><?php echo $job_offer_recommend?></h3>
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
    </script>
    <script src="client-rate.js">
    </script>
</body>

</html>