<?php include "../ClientPortal/recordFolder/recordPost.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <link rel="stylesheet" href="../ClientPortal/ModalFolder/modal_post.css">    
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

<?php include "../ClientPortal/components/navbar.php"?>

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
                            <!-- JOB OFFERED CARD -->          
                            <?php echo include '../ClientPortal/template/tmplt_job_offered.php' ?>
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
                 <!-- R OFFERED CARD -->  
                 <?php echo include_once '../ClientPortal/template/tmplt_recommended_worker.php' ?>
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
        <?php
            include "../ClientPortal/ModalFolder/post_job_modal.php";
        ?>
</body>

</html>