<?php
session_start();
include '../db_con/db_connection.php';



if (isset($_SESSION['worker_id'])) {
    $user_id = $_SESSION['worker_id'];

    // Fetch worker data from tbl_worker
    $query = "SELECT worker_id, firstname, middlename, lastname, phone_no, bio, country, city, region, province, barangay, certs, postalcode, accomplishments 
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
            $acc = $row['accomplishments'];
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
    <link rel="stylesheet" href="../Assets/css/Blue-collar css/blueCollarProfile.css">
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
                    <img src="../Assets/image/worker_user.png" alt="">
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
                <a href="../BlueCollarWorkerPortal/blue-collar-profile.php" id="a">Application</a>
                <a href="../BlueCollarWorkerPortal/overview-profile.php">Experiences</a>
            </div>

            <div class="create-header">
                <div class="create">
                    <img src="../Assets/image/Create.png" alt="Edit" id="edit-trigger" style="cursor:pointer;">
                </div>
            </div>

            <div class="container certifications">
                <span>Certifications</span>
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
                <span>Accomplishments</span>
            </div>
            <div class="all-cert">
                <ul>
                    <li>
                        Successfully completed [specific number] of [projects/installations/orders].
                    </li>
                    <li>
                        Reduced [time/costs/downtime] by [specific percentage] through innovative methods.
                    </li>
                    <li>
                        Consistently met or exceeded safety standards and quality benchmarks.
                    </li>
                </ul>
            </div>

            <button id="save-btn" class="d-none">Save Changes</button>
            <br><br><br><br><br>



            <script>
                document.getElementById('edit-trigger').addEventListener('click', () => {
                    toggleEditMode(true);
                });

                const certs = document.getElementById('certificates-hidden').value;

                document.getElementById('save-btn').addEventListener('click', () => {
                    const certs = document.getElementById('certificates-hidden').value;

                    fetch('../BlueCollarWorkerPortal/scriptsForDbWorker/updateExperience.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                certs
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

                    toggleClass('certificates-input-wrapper', editMode);

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




            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            <script src="../Assets/js/logout.js"></script>
</body>

</html>