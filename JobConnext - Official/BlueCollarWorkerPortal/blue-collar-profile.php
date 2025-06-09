<?php
session_start();
include '../db_con/db_connection.php';



if (isset($_SESSION['worker_id'])) {
    $user_id = $_SESSION['worker_id'];

    // Fetch worker data from tbl_worker
    $query = "SELECT worker_id, firstname, middlename, lastname, phone_no, bio, country, city, region, province, barangay, postalcode, workerAbout, nationality, civilStatus, birthDate, softSkills FROM tbl_worker_information WHERE worker_id = ?";
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
            $birthDate = $row['birthDate'];
            $softSkills = $row['softSkills'];
            $skillsArray = array_filter(array_map('trim', explode(',', $softSkills)));
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
                            Worker
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
                <a href="../BlueCollarWorkerPortal/blue-collar-profile.php" id="active-nav">Application</a>
                <a href="../BlueCollarWorkerPortal/overview-profile.php">Experiences</a>
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

                <span>Soft Skills:</span>
            </div>

            <ul id="soft-skills-text">
                <?php
                foreach ($skillsArray as $skill) {
                    echo "<li>" . htmlspecialchars($skill) . "</li>";
                }
                ?>
            </ul>

            <div id="soft-skills-input-wrapper" class="d-none">
                <input type="text" id="new-soft-skill" class="form-control" placeholder="Add Soft Skill">
                <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addSoftSkill()">Add Skill</button>
                <ul id="soft-skills-editable-list" class="mt-2">
                    <?php
                    foreach ($skillsArray as $skill) {
                        $skill = trim($skill);
                        echo "<li data-skill='" . htmlspecialchars($skill) . "'>" . htmlspecialchars($skill) .
                            " <button type='button' onclick='removeSoftSkill(this)' class='btn btn-sm btn-danger'>Remove</button></li>";
                    }
                    ?>
                </ul>
                <input type="hidden" id="soft-skills-hidden" name="softSkills" value="<?php echo htmlspecialchars($softSkills); ?>">
            </div>

            <div class="resume">
               
            </div>
            <div class="personal-info">
                <span>
                    Personal Information
                </span>
                <ul>
                    <li>
                        Full Name: <span><?php echo htmlspecialchars($fullName) ?></span>
                    </li>
                    <li>
                        Date of Birth:
                        <span id="birth-text"><?php echo htmlspecialchars($birthDate); ?></span>
                        <input
                            type="date"
                            id="birth-input"
                            class="form-control d-none"
                            value="<?php echo (!empty($birthDate) && strtotime($birthDate)) ? htmlspecialchars(date('Y-m-d', strtotime($birthDate))) : ''; ?>">
                    </li>
                    <li>
                        <div class="address">
                            <div class="address-header">Address:</div>
                            <div class="address-content">
                                <span id="header-address">
                                    <p id="address-text"><?php echo htmlspecialchars($address); ?></p>
                                    <input type="text" id="address-input" class="form-control d-none" value="<?php echo htmlspecialchars($address); ?>">
                                </span>
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
                        <input type="text" id="phone-input" class="form-control d-none" id="validationCustom01"
                            pattern="^\+63-\d{3}-\d{3}-\d{4}$" maxlength="16" name="phone_no" required oninput="formatPhoneNumber(this)" value="<?php echo htmlspecialchars($phone); ?>">
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
                        <select id="civil-status-input" class="form-select d-none" value="<?php echo htmlspecialchars($civilStatus); ?>" aria-label="Default select example">
                            <option selected>Civil Status</option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </li>
                </ul>
                <button id="save-btn" class="d-none">Save Changes</button>
                <br><br><br><br><br>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
                    const birthDate = document.getElementById('birth-input').value;
                    const softSkills = document.getElementById('soft-skills-hidden').value;


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
                                civilStatus,
                                birthDate,
                                softSkills
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
                                document.getElementById('about-input').innerText = about;
                                document.getElementById('address-text').innerText = address;
                                document.getElementById('phone-text').innerText = phone;
                                document.getElementById('nationality-text').innerText = nationality;
                                document.getElementById('civil-status-text').innerText = civilStatus;
                                document.getElementById('birth-text').innerText = birthDate;
                                document.getElementById('soft-skills-text').innerHTML = softSkills.split(',').map(skill => `<li>${skill.trim()}</li>`).join('');


                                document.getElementById('map-frame').src = `https://maps.google.com/maps?q=${encodeURIComponent(address)}&output=embed`;

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

                    toggleClass('birth-text', !editMode);
                    toggleClass('birth-input', editMode);

                    toggleClass('soft-skills-input-wrapper', editMode);




                    toggleClass('save-btn', editMode);
                }
            </script>

            <script>
                function addSoftSkill() {
                    const input = document.getElementById('new-soft-skill');
                    const skill = input.value.trim();
                    if (skill === '') return;

                    const ul = document.getElementById('soft-skills-editable-list');

                    // Prevent duplicate entries
                    for (let li of ul.children) {
                        if (li.dataset.skill.toLowerCase() === skill.toLowerCase()) {
                            alert('Skill already added.');
                            return;
                        }
                    }

                    const li = document.createElement('li');
                    li.dataset.skill = skill;
                    li.innerHTML = `${skill} <button type='button' onclick='removeSoftSkill(this)' class='btn btn-sm btn-danger'>Remove</button>`;
                    ul.appendChild(li);

                    input.value = '';
                    updateSoftSkillsHiddenField();
                }

                function removeSoftSkill(button) {
                    const li = button.parentNode;
                    li.remove();
                    updateSoftSkillsHiddenField();
                }

                function updateSoftSkillsHiddenField() {
                    const ul = document.getElementById('soft-skills-editable-list');
                    const skills = Array.from(ul.children).map(li => li.dataset.skill);
                    document.getElementById('soft-skills-hidden').value = skills.join(',');
                }
            </script>

            <script>
                function formatPhoneNumber(input) {
                    // Remove all non-numeric characters
                    let value = input.value.replace(/[^0-9]/g, '');

                    // Ensure the phone number starts with '63' and starts with '+63-'
                    if (value.length > 1 && !value.startsWith('63')) {
                        value = '63' + value.substring(1);
                    }

                    // Format as +63-xxx-xxx-xxxx
                    if (value.length > 3 && value.length <= 5) {
                        value = '+63-' + value.substring(2, 5);
                    } else if (value.length > 5 && value.length <= 8) {
                        value = '+63-' + value.substring(2, 5) + '-' + value.substring(5, 8);
                    } else if (value.length > 8 && value.length <= 12) {
                        value = '+63-' + value.substring(2, 5) + '-' + value.substring(5, 8) + '-' + value.substring(8, 12);
                    }

                    // Ensure it doesn't exceed 16 characters (including +63-xxx-xxx-xxxx)
                    if (value.length > 16) {
                        value = value.substring(0, 16);
                    }

                    // Update the input field with the formatted value
                    input.value = value;
                }
            </script>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            <script src="../Assets/js/logout.js"></script>

</body>

</html>