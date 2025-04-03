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
    $description = $row['description'];
    $job_offer = $row['job_offer'];
    $location = $row['location'];
    $applicants = $row['applicants'];
    $year_exp = $row['year_exp'];
    $deadline = $row['deadline'];
    $salary_start = $row['salary_start'];
    $salary_end = $row['salary_end'];
    $job_title = $row['job_title'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="jobOfferCard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&family=Source+Code+Pro:wght@200..900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
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
    <link rel="icon" href="/../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <title>Card For Job Post</title>
</head>

<body>
    <div class="row job-card" style="text-decoration: none !important;">
        <div class="col-sm-12">

            <div class="card" id="my-offer">
                <a href="client_rate-workers.php" class="card-link">
                    <div class="job-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="../../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                            </div>
                            <div class="details">
                                <h3><?php echo htmlspecialchars($job_title); ?></h3>
                                <p>Php<?php echo number_format($salary_start); ?>₱–<?php echo number_format($salary_end); ?>₱ • <?php echo $applicants; ?> Applicants • Active</p>
                            </div>
                        </div>
                        <div class="job-dates">
                            <div class="menu">•••</div>
                            <p>Deadline: <?php echo htmlspecialchars($deadline); ?></p>
                        </div>
                    </div>
                    <div class="job-body">
                        <div class="info">
                            <p><strong>Location:</strong> <?php echo htmlspecialchars($location); ?></p>
                            <p><strong>Years of experience:</strong> <?php echo $year_exp; ?></p>
                        </div>
                        <div class="skills">
                            <p><strong>Job Offer:</strong></p>
                            <span class="skill-tag green"><?php echo htmlspecialchars($job_offer); ?></span>
                        </div>
                    </div>
                    <div class="job-footer">
                        <p><?php echo $applicants; ?> Applied</p>
                        <p>0 Accepted</p>
                    </div>
            </div>
            </a>
        </div>


    </div>
    </div>
</body>

</html>