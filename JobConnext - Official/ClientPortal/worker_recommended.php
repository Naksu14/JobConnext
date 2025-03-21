<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/worker_recommended.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
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
</head>

<body>
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

                        
                        $job_offered_clientname = "SELECT * FROM tbl_client_information WHERE client_id = 2001";
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
</body>

</html>