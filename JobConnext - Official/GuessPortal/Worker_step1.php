<?php
session_start();
ob_start();

include "../db_con/db_connection.php"; // Ensure db_connection.php defines $conn properly

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <style>
        .skills-container {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .form-check {
            margin: 0;
            padding: 0;
        }

        .form-check-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .form-check-label {
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease-in-out;
        }

        /* Skill-specific colors */
        .form-check-label[for="Welder"] {
            background-color: #c4f0c4;
            /* Light green */
            color: #000;
        }

        .form-check-label[for="Electrician"] {
            background-color: #e5d4ff;
            /* Light purple */
            color: #000;
        }

        .form-check-label[for="TruckDriver"] {
            background-color: #e9f7a1;
            /* Light yellow-green */
            color: #000;
        }

        .form-check-label[for="Plumber"] {
            background-color: #ffcccc;
            /* Light red */
            color: #000;
        }

        .form-check-label[for="Others"] {
            background-color: #ffdaf6;
            /* Light pink */
            color: #000;
        }

        /* Active (checked) state */
        .form-check-input:checked+.form-check-label {
            border-color: #333;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            transform: scale(1.05);
        }

        /* Style for displayed skills in "Your Skills" */
        .displayed-skill {
            text-align: center;
            cursor: default;
            transition: none;
            /* Remove hover effect */
        }
    </style>
</head>

<body>

    <div class="container-fluid pb-5">
        <div class="d-flex flex-column align-items-center">
            <img src="../Assets/image/Logo1.png" width="90px" height="90px" alt="logo">
            <h2 class="poppins-bold">Sign <span style="color: #E46232;">Up</span></h2>
            <p class="poppins-regular">Creating client account</p>
        </div>

        <div class="text d-flex flex-row justify-content-center align-items-center">
            <div class="flex-column justify-content-center align-items-center">
                <img src="../Assets/image/BlueCollarWorkerImg.png" alt="Worker_img" width="600px" height="600px">
                <p class="poppins-regular text-center">Looking for job</p>
            </div>

            <div class="container-fluid ps-5 pe-5 pt-4 border border-2 rounded shadow bg-body-tertiary d-flex flex-column align-items-center" style="width: 40%; height: auto">

                <form action="Worker_step1.php" method="post" onsubmit="return checkPassword()" class="d-flex flex-column mt-4" id="myForm" style="width: 100%; height: auto">
                    <h3 class="poppins-bold text-center mb-5">Step 1: Login Details</h3>

                    <label for="username" class="poppins-medium">Username</label>
                    <input type="text" name="username" id="username" required>

                    <label for="email" class="poppins-medium">Email</label>
                    <input type="email" name="email" id="email" required>

                    <label for="password" class="poppins-medium">Password</label>
                    <input type="password" name="password" id="password" required>

                    <p id="error-message" class="text-danger fs-6">
                    Password must contain at least 8 characters, 1 uppercase, 1 number, and 1 special character.
                    </p>

                    <p class="poppins-regular">Choose your skills</p>
                    <div class="skills-container">
                        <?php
                        $query = "SELECT * FROM tbl_skills";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $skillName = htmlspecialchars($row['skills']);
                                echo '
                                    <div class="form-check">
                                        <input class="form-check-input skills" name="skills[]" type="checkbox" value="' . $skillName . '" id="' . $skillName . '">
                                        <label class="form-check-label" for="' . $skillName . '">' . $skillName . '</label>
                                    </div>
                                ';
                            }
                        }
                        ?>
                    </div>
                    <br>
                    <p class="poppins-regular">Your skills:
                        <div id="selected-skills-container" class="skills-container"></div>
                    </p>
                    <p id="check_message"></p>

                    <script>
                        const skillCheckboxes = document.querySelectorAll('.form-check-input.skills');
                        const selectedSkillsContainer = document.getElementById('selected-skills-container');

                        function updateSelectedSkills() {
                            selectedSkillsContainer.innerHTML = '';
                            skillCheckboxes.forEach(checkbox => {
                                if (checkbox.checked) {
                                    const skillLabel = document.querySelector(`label[for="${checkbox.id}"]`);
                                    const skillDisplay = document.createElement('span');
                                    skillDisplay.textContent = skillLabel.textContent;
                                    skillDisplay.className = 'displayed-skill';
                                    skillDisplay.style.backgroundColor = window.getComputedStyle(skillLabel).backgroundColor;
                                    skillDisplay.style.color = window.getComputedStyle(skillLabel).color;
                                    skillDisplay.style.padding = '10px 15px';
                                    skillDisplay.style.borderRadius = '5px';
                                    skillDisplay.style.fontSize = '14px';
                                    skillDisplay.style.fontWeight = 'bold';
                                    skillDisplay.style.margin = '2px';
                                    selectedSkillsContainer.appendChild(skillDisplay);
                                }
                            });
                        }

                        skillCheckboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', updateSelectedSkills);
                        });

                        document.getElementById("myForm").addEventListener("submit", function(event) {
                        let checkboxes = document.querySelectorAll('.form-check-input.skills'); // Select all checkboxes
                        let checked = Array.from(checkboxes).some(checkbox => checkbox.checked); // Check if at least one is checked
                        message = document.getElementById("check_message")
                        if (!checked) {
                            message.textContent = "Please select at least one skill.";
                            message.style.color = "red";
                            event.preventDefault();
                        }else{
                            message.textContent = "";
                        }

                        
                        
                        });

                        function checkPassword(){
                            const password = document.getElementById("password").value;
                            const errorMessage = document.getElementById("error-message");
                            const minLength = 8;
                            const uppercaseRegex = /[A-Z]/;
                            const numberRegex = /[0-9]/;
                            const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;

                            if (password.length < minLength) {
                                errorMessage.textContent = "Password must be at least 8 characters long.";
                                event.preventDefault();
                                return false;
                            }
                            if (!uppercaseRegex.test(password)) {
                                errorMessage.textContent = "Password must contain at least one uppercase letter.";
                                event.preventDefault();
                                return false;
                            }
                            if (!numberRegex.test(password)) {
                                errorMessage.textContent = "Password must contain at least one number.";
                                event.preventDefault();
                                return false;
                            }
                            if (!specialCharRegex.test(password)) {
                                errorMessage.textContent = "Password must contain at least one special character.";
                                event.preventDefault();
                                return false;
                            }
                
                            errorMessage.textContent = "";
                            return true;

                        }

                    </script>

                    <div class="btn_sub d-flex justify-content-between mt-3 mb-3">
                        <a href="SIgn_Up.php" style="color:#161D6F">Back</a>
                        <button type="submit" class="btn btn-primary">Next Step</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <footer class="blockquote-footer text-white m-0 text-center" style="background-color: #161D6F;">
        <p>&copy; 2024 JobConnext. All rights reserved.</p>
        <p class="m-0">
            <a style="text-decoration: none; color: white;" href="#privacy-policy">Privacy Policy</a> |
            <a style="text-decoration: none; color: white;" href="#terms-of-service">Terms of Service</a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? '');
    $email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"] ?? '';
    $skills = $_POST["skills"] ?? [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        die("Password must contain at least 8 characters, 1 uppercase, 1 number, and 1 special character.");
    }
    

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tbl_blue_collar_worker (username, email, hash_password) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            $worker_id = $stmt->insert_id;

            if (!empty($skills)) {
                $skill_stmt = $conn->prepare("INSERT INTO tbl_worker_skill_sets (worker_id, skills) VALUES (?, ?)");

                if ($skill_stmt) {
                    foreach ($skills as $skill) {
                        $sanitized_skill = htmlspecialchars($skill, ENT_QUOTES, 'UTF-8');
                        $skill_stmt->bind_param("is", $worker_id, $sanitized_skill);
                        $skill_stmt->execute();
                    }
                    $skill_stmt->close();
                }
            }

            $_SESSION['worker_id'] = $worker_id;

            header("Location: Worker_step2.php");
            exit();
        }
        $stmt->close();
    }
}

$conn->close();
?>

