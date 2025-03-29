

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