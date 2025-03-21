<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>