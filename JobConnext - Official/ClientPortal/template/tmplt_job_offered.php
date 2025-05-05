<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "job_connext"; // Change if different

$conn = new mysqli($servername, $username, $password, $database);
?>

<?php
$job_offeredQRY = "SELECT * FROM tbl_client_jobpost";
$job_offeredEXE = mysqli_query($conn, $job_offeredQRY);
while ($row = mysqli_fetch_assoc($job_offeredEXE)) {

    $client_id = $row['client_id'];
    $job_salary_start = $row['salary_start'];
    $job_salary_end = $row['salary_end'];
    $num_applicants = $row['applicants'];
    $yr_Exp = $row['year_exp'];
    $job_loc = $row['location'];
    $date_posted = $row['deadline'];
    $job_offer = $row['job_offer'];
    $job_status = $row['job_status'];


    $job_offered_clientname = "SELECT * FROM tbl_client_information WHERE client_id = $client_id";
    $job_ex_offered_name = mysqli_query($conn, $job_offered_clientname);
    $getjobdata_offered = mysqli_fetch_assoc($job_ex_offered_name);

    $clientoffered_Fname = $getjobdata_offered['firstname'];
    $clientoffered_Mname = $getjobdata_offered['middlename'];
    $clientoffered_Sname = $getjobdata_offered['lastname'];
    $company_name = $getjobdata_offered['firstname'];

    $job_offered_companyname_QRY = "SELECT * FROM tbl_client_information";
    $job_offered_companyEXE = mysqli_query($conn, $job_offered_companyname_QRY);
    $job_offered_companyGET = mysqli_fetch_assoc($job_offered_companyEXE);

    $company_name = $job_offered_companyGET['firstname'];

    if ($job_status == null) {
        $status =  "Inactive";
    } else {
        $status = "Active";
    }

    include '..\ClientPortal\template\tmplt_chipClient_NEEDSarray.php' //tmplt_chipCOLLAR_SKILLS.php 
?>
    <a href="../ClientPortal/client-showjob.php" class="card-link" style="color: black;">
        <div class="card" id="my-offer">
            <div class="job-header">
                <div class="profile-info">
                    <div class="avatar">
                        <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                    </div>
                    <div class="details">
                        <h3><?php echo $company_name ?></h3>
                        <p><?php echo " " . "•" . " " . "Php" . $job_salary_start . " " . $job_salary_end . " " . "•" . " " . $num_applicants . " " . "Applicants" . $status ?></p>
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
                    <span class="skill-tag"><?php echo jobpostFunction_for_collar_skill() ?></span>
                </div>
            </div>
            <div class="job-footer">
                <button onclick="showAlert()" style="border: none;">
                    <p>5 Applied</p>
                </button>
                <p>0 Accepted</p>
            </div>
        </div>
    </a>
    <br>

<?php } ?>