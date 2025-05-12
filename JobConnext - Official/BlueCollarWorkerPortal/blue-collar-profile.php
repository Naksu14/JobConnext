<?php
session_start();
include '../db_con/db_connection.php';



if (isset($_SESSION['worker_id'])) {
    $user_id = $_SESSION['worker_id'];

    // Fetch worker data from tbl_worker
    $query = "SELECT worker_id, firstname, middlename, lastname, phone_no, bio, country, city, region, province, barangay, postalcode, workerAbout, nationality, civilStatus, workerAddress FROM tbl_worker_information WHERE worker_id = ?";
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
            $workerAbout = $row['workerAbout'];
            $nationality = $row['nationality'];
            $civilStatus = $row['civilStatus'];
            $workerAddress = $row ['workerAddress'];
        }
    }
    $stmt->close();
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
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
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
                        ID:<?php echo htmlspecialchars($worker_id) ?>
                    </span>
                </div>
            </div>


            <div class="container-fluid profile-nav">
                <a href="../BlueCollarWorkerPortal/blue-collar-profile.php" id="active-nav">Application</a>
                <a href="../BlueCollarWorkerPortal/overview-profile.php">Experiences</a>
                <a href="blue-collar-certificates.php">Certificate and others</a>
            </div>

            <div class="create-header">
                <div class="create">
                    <img src="../Assets/image/Create.png" alt="Edit" id="edit-trigger" style="cursor:pointer;">
                </div>
            </div>

            <div class="container about">
                <span class="aboutUsHeader">About</span>
            </div>
            <div class="aboutText">
                <p id="about-text"><?php echo nl2br(htmlspecialchars($workerAbout)); ?></p>
                <textarea id="about-input" class="form-control d-none"><?php echo htmlspecialchars($workerAbout); ?></textarea>
            </div>
            <div class="container my-skills">
                <span>Skills</span>
            </div>
            <div class="addedSkills">
                <ul>
                    <li>
                        Technical Skills: technical expertise, such as wiring, welding, machinery maintenance
                    </li>
                    <li>
                        Tools & Equipment: Proficient in using power tools, forklifts, lathe machines
                    </li>
                    <li>
                        Soft Skills: teamwork, communication, time management, problem-solving
                    </li>
                </ul>
            </div>
            <div class="resume">
                <span>
                    Resume
                </span>
                <div class="resume-details">
                    <div class="resume-left">
                        <img src="../Assets/image/resume.png" alt="">
                        <div class="resume-file">
                            <span id="file-name">
                                About me resume.pdf
                            </span>
                            <span id="file-size">
                                234kb
                            </span>
                        </div>
                    </div>

                    <div class="resume-right">
                        <div class="download">
                            <span>
                                Download
                            </span>
                            <img src="../Assets/image/Downloading Updates.png" alt="">
                        </div>
                        <div class="update">
                            <span>
                                Update
                            </span>
                            <img src="../Assets/image/refresh 1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="personal-info">
                <span>
                    Personal Information
                </span>
                <ul>
                    <li>
                        Full Name: <?php echo htmlspecialchars($fullName) ?>
                    </li>
                    <li>
                        Date of Birth: [MM/DD/YYYY]
                    </li>
                    <li>
                        <div class="address">
                            <div class="address-header">Address:</div>
                            <div class="address-content">
                                <h6 id="header-address">
                                    <p id="address-text"><?php echo htmlspecialchars($address); ?></p>
                                    <input type="text" id="address-input" class="form-control d-none" value="<?php echo htmlspecialchars($address); ?>">
                                </h6>
                            </div>
                            <div class="address-img">
                                <div class="show-location">
                                    <iframe
                                        id="map-frame"
                                        width="100%" height="250"
                                        style="border:0; border-radius: 0px;"
                                        loading="lazy" allowfullscreen
                                        referrerpolicy="no-referrer-when-downgrade"
                                        src="https://maps.google.com/maps?q=<?php echo urlencode($address); ?>&output=embed">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        Contact Number:<span id="phone-text"><?php echo htmlspecialchars($phone); ?></span>
                        <input type="text" id="phone-input" class="form-control d-none" value="<?php echo htmlspecialchars($phone); ?>">
                    </li>
                    <li>
                        Email Address:
                        <span id="email-text"><?php echo htmlspecialchars($workerEmail); ?></span>
                    </li>
                    <li>
                        Nationality:
                        <span id="nationality-text"><?php echo htmlspecialchars($nationality); ?></span>
                        <input type="text" id="nationality-input" class="form-control d-none" value="<?php echo htmlspecialchars($nationality); ?>">
                    </li>
                    <li>
                        Civil Status:
                        <span id="civil-status-text"><?php echo htmlspecialchars($civilStatus); ?></span>
                        <input type="text" id="civil-status-input" class="form-control d-none" value="<?php echo htmlspecialchars($civilStatus); ?>">
                    </li>
                </ul>
                <button id="save-btn" class="d-none">Save Changes</button>
                <br><br><br><br><br>

            </div>

            <script>
                document.getElementById('edit-trigger').addEventListener('click', () => {
                    toggleEditMode(true);
                });

                document.getElementById('save-btn').addEventListener('click', () => {
                    const about = document.getElementById('about-input').value;
                    const address = document.getElementById('address-input').value;
                    const phone = document.getElementById('phone-input').value;
                    const nationality = document.getElementById('nationality-input').value;
                    const civilStatus = document.getElementById('civil-status-input').value;

                    fetch('../BlueCollarWorkerPortal/scriptsForDbWorker/updateWorkerProfile.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                about,
                                address,
                                phone,
                                nationality,
                                civilStatus
                            })
                        })
                        .then(response => response.text()) // Read raw text first
                        .then(text => {
                            console.log('Raw response:', text); // Debug output

                            let data;
                            try {
                                data = JSON.parse(text);
                            } catch (error) {
                                console.error('JSON parse error:', error);
                                alert('Server returned an invalid response. Check the console for details.');
                                return;
                            }

                            if (data.success) {
                                document.getElementById('about-text').innerText = about;
                                document.getElementById('address-text').innerText = address;
                                document.getElementById('phone-text').innerText = phone;
                                document.getElementById('nationality-text').innerText = nationality;
                                document.getElementById('civil-status-text').innerText = civilStatus;


                                document.getElementById('map-frame').src = `https://maps.google.com/maps?q=${encodeURIComponent(address)}&output=embed`;

                                Swal.fire({
                                    toast: true,
                                    position: 'top-end', // or 'top-start', 'bottom-end', etc.
                                    icon: 'success',
                                    title: 'Profile Updated',
                                    text: 'Your profile has been successfully updated!',
                                    showConfirmButton: false,
                                    timer: 3000, // Auto close after 3 seconds
                                    timerProgressBar: true,
                                    customClass: {
                                        popup: 'colored-toast'
                                    }
                                }).then(() => {
                                    toggleEditMode(false);
                                });

                            } else {
                                alert('Update failed: ' + (data.message || 'Unknown error.'));
                            }
                        })
                        .catch(err => {
                            console.error('Fetch error:', err);
                            alert('Request failed. Check your internet connection or server.');
                        });
                });

                function toggleEditMode(editMode) {
                    const toggleClass = (id, show) => {
                        document.getElementById(id).classList.toggle('d-none', !show);
                    };

                    toggleClass('about-text', !editMode);
                    toggleClass('about-input', editMode);

                    toggleClass('address-text', !editMode);
                    toggleClass('address-input', editMode);

                    toggleClass('phone-text', !editMode);
                    toggleClass('phone-input', editMode);


                    toggleClass('nationality-text', !editMode);
                    toggleClass('nationality-input', editMode);

                    toggleClass('civil-status-text', !editMode);
                    toggleClass('civil-status-input', editMode);


                    toggleClass('save-btn', editMode);
                }
            </script>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            <script src="../Assets/js/logout.js"></script>

</body>

</html>