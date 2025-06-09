<?php
session_start();
include '../db_con/db_connection.php';



if (isset($_SESSION['worker_id'])) {
    $user_id = $_SESSION['worker_id'];

    // Fetch worker data from tbl_worker
    $query = "SELECT worker_id, firstname, middlename, lastname, phone_no, bio, country, city, region, province, barangay, certs, postalcode, acc 
              FROM tbl_worker_information WHERE worker_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $worker_id = $row['worker_id'];
            $fullName = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
            $phone = $row['phone_no'];
            $bio = $row['bio'];
            $address = $row['barangay'] . ', ' . $row['city'] . ', ' . $row['province'] . ', ' . $row['region'] . ', ' . $row['country'] . ' - ' . $row['postalcode'];
            $certs = $row['certs'];
            $certArray = array_filter(array_map('trim', explode(',', $certs)));
            $acc = $row['acc'];
            $accArray = array_filter(array_map('trim', explode(',', $acc)));
        }
        $stmt->close();
    }
}
//email address
$query = "SELECT email FROM tbl_blue_collar_worker WHERE worker_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $workerEmail = $row['email'];
}
$stmt->close();
$query = "SELECT skills FROM tbl_worker_skill_sets WHERE worker_id = ?";

$colors = ['#D8CBFF', '#FFD8CB', '#CBFFD8', '#CBCDFF', '#FFCBE5', '#E0CBFF']; // Add more if needed


$skill_qry = "SELECT * FROM tbl_worker_skill_sets WHERE worker_id = $worker_id";
$skill_exe = mysqli_query($conn, $skill_qry);

$i = 0;
$skill_tags = '';
while ($skill_row = mysqli_fetch_assoc($skill_exe)) {
    $skill_name = $skill_row['skills'];
    $color = $colors[$i % count($colors)];
    $skill_tags .= "<span class='skill-tag1' style='background-color: $color;'>{$skill_name}</span> ";
    $i++;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/Blue-collar css/blueCollarProfile.css">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>
    <?php include "../BlueCollarWorkerPortal/components/navbar.php" ?>

    <div class="container-fluid main-content">
        <div class="settings-container">
            <a href="../BlueCollarWorkerPortal/profile-settings.php">
                <img src="../Assets/image/Settings.png" alt="">
            </a>
        </div>
        <div class="container-fluid full-content">
            <div class="container-fluid profile-content">
                <div class="client-photo">
                    <div class="header-left">
                        <img src="../BlueCollarWorkerPortal/scriptsForDbWorker/workerImage.php?worker_id=<?php echo $worker_id; ?>" alt="Worker Image">
                    </div>
                    <div class="name-title">
                        <span>
                            <?php echo htmlspecialchars($fullName) ?>
                        </span>
                        <h6>
                            <img src="../Assets/image/User.png" alt="">
                            Freelance
                        </h6>
                        <h6>
                            <img src="../Assets/image/Location.png" alt="">
                            <?php echo htmlspecialchars($address) ?>
                        </h6>
                        <div class="skills">
                            <p>Skills:</p>

                        </div>
                        <div class="skill-card">
                            <span class="skill-tag"><?php echo $skill_tags; ?></span>
                        </div>

                    </div>
                </div>
                <div class="client_id">
                    <span>
                        ID: <?php echo htmlspecialchars($worker_id) ?>
                    </span>
                </div>
            </div>


            <div class="container-fluid profile-nav">
                <a href="../BlueCollarWorkerPortal/blue-collar-profile.php">Application</a>
                <a href="../BlueCollarWorkerPortal/overview-profile.php" id="active-nav">Experiences</a>
            </div>

            <div class="create-header">
                <div class="create">
                    <img src="../Assets/image/Create.png" alt="Edit" id="edit-trigger" style="cursor:pointer;">
                </div>
            </div>

            <div class="container certifications">
                <span><b>Certifications</b></span>
            </div>

            <div class="all-cert">

                <ol id="certificates-text">
                    <?php foreach ($certArray as $certs): ?>
                        <li><?php echo htmlspecialchars($certs); ?></li>
                    <?php endforeach; ?>
                </ol>

                <div id="certificates-input-wrapper" class="d-none">
                    <input type="text" id="new-certificate" class="form-control" placeholder="Add Certificate">
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addCertificate()">Add Certificate</button>

                    <ul id="certificates-editable-list" class="mt-2">
                        <?php foreach ($certArray as $certs): ?>
                            <?php $certs = trim($certs); ?>
                            <li data-certs="<?php echo htmlspecialchars($certs); ?>">
                                <?php echo htmlspecialchars($certs); ?>
                                <button type="button" onclick="removeCertificate(this)" class="btn btn-sm btn-danger">Remove</button>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Hidden input for form submission or AJAX -->
                    <input type="hidden" id="certificates-hidden" name="certificates" value="<?php echo htmlspecialchars(implode(',', $certArray)); ?>">

                </div>

            </div>

            <div class="container certifications">
                <span><b>Accomplishments</b></span>
            </div>

            <div class="all-cert">
                <ol id="accomplishments-text">
                    <?php foreach ($accArray as $acc): ?>
                        <li><?php echo htmlspecialchars($acc); ?></li>
                    <?php endforeach; ?>
                </ol>

                <div id="accomplishments-input-wrapper" class="d-none">
                    <input type="text" id="new-accomplishment" class="form-control" placeholder="Add Accomplishment">
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addAccomplishment()">Add Accomplishment</button>

                    <ul id="accomplishments-editable-list" class="mt-2">
                        <?php foreach ($accArray as $acc): ?>
                            <?php $acc = trim($acc); ?>
                            <li data-acc="<?php echo htmlspecialchars($acc); ?>">
                                <?php echo htmlspecialchars($acc); ?>
                                <button type="button" onclick="removeAccomplishment(this)" class="btn btn-sm btn-danger">Remove</button>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <input type="hidden" id="accomplishments-hidden" name="accomplishments" value="<?php echo htmlspecialchars(implode(',', $accArray)); ?>">
                </div>
            </div>


            <button id="save-btn" class="d-none">Save Changes</button>
            <br><br>

            <div class="work-history">
                <span>History</span>
                <?php

$query = "SELECT 
            a.worker_id, 
            a.job_post_id, 
            a.comment, 
            a.status,
            j.client_id, 
            j.job_offer, 
            j.salary_start, 
            j.salary_end,
            j.client_file, 
            j.filePath, 
            j.job_status, 
            j.description,
            j.location, 
            j.applicants, 
            j.year_exp, 
            j.start_posted, 
            j.deadline,
            c.company_name,
            c.company_aboutUs,
            c.company_Address
          FROM tbl_applicants AS a
          JOIN tbl_client_jobpost AS j ON a.job_post_id = j.job_post_id
          JOIN tbl_company_info AS c ON j.client_id = c.client_id
          WHERE a.worker_id = '$user_id' AND j.job_status = 'InActive'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $client_id = $row['client_id'];
    $jobTitle = $row['job_offer'];
    $location = $row['location'];
    $salary_start = $row['salary_start'];
    $salary_end = $row['salary_end'];
    $image = $row['filePath'] ?? 'Assets/images/noProfile.jpg';
    $jobId = $row['job_post_id'];
    $companyName = $row['company_name'];

    echo '
    <div class="col-sm-12">
        <div class="card" id="my-offer">
            <a href="../BlueCollarWorkerPortal/rejected-bluecollar.php?job_id=' . $jobId . '">
                <div class="job-header">
                    <div class="profile-info">
                        <div class="avatar">
                            <img src="../ClientPortal/scriptsfordb/client_image.php?client_id=' . $client_id . '" alt="Client Image">
                        </div>
                        <div class="details">
                            <h3>' . htmlspecialchars($companyName) . '</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="job-dates">
                        <img src="../Assets/image/bookmark-white 1 original.png" alt=""
                             style="width:17px; height:17px; background-color:#161D6F; margin:7px;">
                    </div>
                </div>
                <div class="job-body">
                    <div class="info">
                        <p><strong>Job Offer:</strong> ' . htmlspecialchars($jobTitle) . '</p>
                        <p><strong>Location:</strong> ' . htmlspecialchars($location) . '</p>
                        <p><strong>Php:</strong> ' . $salary_start . ' - ' . $salary_end . '</p>
                    </div>
                    <div class="completed-sign">
                        <span>Job Completed</span>
                    </div>
                </div>
            </a>
        </div>
    </div>';
}
?>





                <script>
                    document.getElementById('edit-trigger').addEventListener('click', () => {
                        toggleEditMode(true);
                    });

                    document.getElementById('save-btn').addEventListener('click', () => {
                        // Get updated values **at the time of clicking Save**
                        const certs = document.getElementById('certificates-hidden').value;
                        const acc = document.getElementById('accomplishments-hidden').value;

                        fetch('../BlueCollarWorkerPortal/scriptsForDbWorker/updateWorkerProfile.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    certs,
                                    acc
                                })
                            })
                            .then(response => response.text())
                            .then(text => {
                                console.log('Raw response:', text);

                                let data;
                                try {
                                    data = JSON.parse(text);
                                } catch (error) {
                                    console.error('JSON parse error:', error);
                                    alert('Server returned an invalid response. Check the console for details.');
                                    return;
                                }

                                if (data.success) {
                                    document.getElementById('certificates-text').innerHTML = certs.split(',').map(cert => `<li>${cert.trim()}</li>`).join('');
                                    document.getElementById('accomplishments-text').innerHTML = acc.split(',').map(acc => `<li>${acc.trim()}</li>`).join('');

                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Profile Updated',
                                        text: 'Your profile has been successfully updated!',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        customClass: {
                                            popup: 'colored-toast'
                                        }
                                    }).then(() => {
                                        toggleEditMode(false);
                                        location.reload();
                                    });
                                } else {
                                    alert('Update failed: ' + (data.message || 'Unknown error.'));
                                }
                            })
                            .catch(err => {
                                console.error('Fetch error:', err);
                                alert('Request failed. ' + err.message);
                            });
                    });

                    function toggleEditMode(editMode) {
                        const toggleClass = (id, show) => {
                            document.getElementById(id).classList.toggle('d-none', !show);
                        };

                        toggleClass('certificates-input-wrapper', editMode);
                        toggleClass('accomplishments-input-wrapper', editMode);
                        toggleClass('save-btn', editMode);
                    }
                </script>



                <script>
                    function addCertificate() {
                        const input = document.getElementById('new-certificate');
                        const cert = input.value.trim();
                        if (cert === '') return;

                        const ul = document.getElementById('certificates-editable-list');

                        // Prevent duplicates
                        for (let li of ul.children) {
                            if (li.dataset.certs.toLowerCase() === cert.toLowerCase()) {
                                alert('Certificate already added.');
                                return;
                            }
                        }

                        const li = document.createElement('li');
                        li.dataset.certs = cert;
                        li.innerHTML = `${cert} <button type='button' onclick='removeCertificate(this)' class='btn btn-sm btn-danger'>Remove</button>`;
                        ul.appendChild(li);

                        input.value = '';
                        updateCertificatesHiddenField();
                    }

                    function removeCertificate(button) {
                        const li = button.parentNode;
                        li.remove();
                        updateCertificatesHiddenField();
                    }

                    function updateCertificatesHiddenField() {
                        const ul = document.getElementById('certificates-editable-list');
                        const certs = Array.from(ul.children).map(li => li.dataset.certs);
                        document.getElementById('certificates-hidden').value = certs.join(',');
                    }
                </script>

                <script>
                    function addAccomplishment() {
                        const input = document.getElementById('new-accomplishment');
                        const acc = input.value.trim();
                        if (acc === '') return;

                        const ul = document.getElementById('accomplishments-editable-list');

                        for (let li of ul.children) {
                            if (li.dataset.acc.toLowerCase() === acc.toLowerCase()) {
                                alert('Accomplishment already added.');
                                return;
                            }
                        }

                        const li = document.createElement('li');
                        li.dataset.acc = acc;
                        li.innerHTML = `${acc} <button type='button' onclick='removeAccomplishment(this)' class='btn btn-sm btn-danger'>Remove</button>`;
                        ul.appendChild(li);

                        input.value = '';
                        updateAccomplishmentsHiddenField();
                    }

                    function removeAccomplishment(button) {
                        const li = button.parentNode;
                        li.remove();
                        updateAccomplishmentsHiddenField();
                    }

                    function updateAccomplishmentsHiddenField() {
                        const ul = document.getElementById('accomplishments-editable-list');
                        const acc = Array.from(ul.children).map(li => li.dataset.acc);
                        document.getElementById('accomplishments-hidden').value = acc.join(',');
                    }
                </script>





                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
                </script>
                <script src="../Assets/js/logout.js"></script>

</body>

</html>