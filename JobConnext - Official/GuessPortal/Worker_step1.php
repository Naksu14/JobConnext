<?php
include "../db_con/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="../Assets/image/Logo1.png" sizes="32x32" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>

<body>
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

                <form action="Sign_Up_Process.php" method="post" class="d-flex flex-column mt-4">

                    <h3 class="poppins-bold text-center mb-5">Step 1: Login Details</h3>

                    <label for="username" class="poppins-medium">Username</label>
                    <input type="text" name="username" id="username" required>

                    <label for="email" class="poppins-medium">Email</label>
                    <input type="text" name="Email" id="Email" required>

                    <label for="password" class="poppins-medium">Password</label>
                    <input type="password" name="password" id="password" required>

                    <p id="password-validation" class="text-danger fs-6">Password must contain at least 8 characters 1 uppercase, 1 number and 1 special character</p>
                    </p>

                    <p class="poppins-regular">Choose your skills</p>
                    <div class="skills-container">
                        <?php
                        //     $stmt = $pdo->prepare("SELECT * FROM tbl_skills");
                        //     $stmt->execute();
                        //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        //     foreach ($result as $row) {
                        //         echo '
                        //             <div class="form-check">
                        //                 <input class="form-check-input skills" type="checkbox" value="' . htmlspecialchars($row['skills']) . '" id="' . htmlspecialchars($row['skills']) . '">
                        //                 <label class="form-check-label" for="' . htmlspecialchars($row['skills']) . '">' . htmlspecialchars($row['skills']) . '</label>
                        //             </div>
                        //         ';
                        //     }
                        // 
                        ?>
                    </div>
                    <br>
                    <p class="poppins-regular">Your skills:
                    <div id="selected-skills-container" class="skills-container"></div>
                    </p>

                    <script>
                        // Get all skill checkboxes
                        const skillCheckboxes = document.querySelectorAll('.form-check-input.skills');
                        const selectedSkillsContainer = document.getElementById('selected-skills-container');

                        // Function to update the displayed skills
                        function updateSelectedSkills() {
                            // Clear the container first
                            selectedSkillsContainer.innerHTML = '';

                            // Loop through the checkboxes and display checked skills with styles
                            skillCheckboxes.forEach(checkbox => {
                                if (checkbox.checked) {
                                    const skillLabel = document.querySelector(`label[for="${checkbox.id}"]`);
                                    const skillDisplay = document.createElement('span');
                                    skillDisplay.textContent = skillLabel.textContent;
                                    skillDisplay.className = 'displayed-skill'; // Class for displayed skills

                                    // Copy the styles of the checkbox label
                                    skillDisplay.style.backgroundColor = window.getComputedStyle(skillLabel).backgroundColor;
                                    skillDisplay.style.color = window.getComputedStyle(skillLabel).color;
                                    skillDisplay.style.padding = '10px 15px'; // Padding
                                    skillDisplay.style.borderRadius = '5px'; // Rounded corners
                                    skillDisplay.style.fontSize = '14px'; // Match font size
                                    skillDisplay.style.fontWeight = 'bold'; // Bold text
                                    skillDisplay.style.margin = '2px'; // Add margin between items
                                    selectedSkillsContainer.appendChild(skillDisplay);
                                }
                            });
                        }

                        // Add event listeners to all skill checkboxes
                        skillCheckboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', updateSelectedSkills);
                        });
                    </script>

                    <div class="btn_sub d-flex justify-content-between mt-3 mb-3">
                        <a href="signup.php" style="color:#161D6F">Back</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>