<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
ob_start();

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
<style>
    /* Basic styling for text */
    h4 {
        font-weight: bold;
    }

    p {
        margin: 0;
        font-size: 14px;
        color: #555;
    }

    .file-note {
        font-size: 12px;
        color: gray;
    }

    /* Custom styling for the upload section */
    .resume-upload {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 10px;
    }

    .upload-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: white;
        border: 2px solid #000080; /* Navy border */
        border-radius: 5px;
        font-size: 16px;
        color: #000080; /* Navy text */
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .upload-btn:hover {
        background-color: #000080;
        color: white;
    }

    .form-control-file {
        display: none; /* Hide the default file input */
    }

    .file-status {
        margin-top: 5px;
        font-size: 12px;
        color: gray;
    }
    
    .submit-btn {
        background-color: #000080;
        color: white;
    }
    .submit-btn:hover {
        background-color: #000080;
        color: white;
    }
</style>
<body>

<div class="container-fluid pb-5">

            <div class="d-flex flex-column align-items-center">
                <img src="../Assets/image/Logo1.png" width="90px" height="90px" alt="logo">
                <h2 class="poppins-bold">Sign <span style="color: #E46232;">Up</span></h2>
                <p class="poppins-regular">Creating client account</p>
            </div>

            <div class="text d-flex flex-row justify-content-center align-items-center">
                <div class="container-fluid ps-5 pe-5 pt-4 border border-2 rounded shadow bg-body-tertiary d-flex flex-column align-items-center" style="width: 80%; height: auto">
                    
                    <form action="Worker_step2.php" enctype="multipart/form-data" method="post" class="row g-3 needs-validation" novalidate>

                        <h3 class="poppins-bold text-center mb-5">Step 2: User Profile</h3>
                        <h4 >Personal Information</h4>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Firstname</label>
                            <input type="text" class="form-control" id="validationCustom01" name="firstname" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Middlename</label>
                            <input type="text" class="form-control" id="validationCustom01" name="middlename" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Lastname</label>
                            <input type="text" class="form-control" id="validationCustom01" name="lastname" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                pattern="^\+63-\d{3}-\d{3}-\d{4}$" maxlength="16" name="phone_no" required oninput="formatPhoneNumber(this)">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        

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


                        <div class="col-md-7">
                            <label for="validationCustom01" class="form-label">Bio</label>
                            <input type="text" class="form-control" id="validationCustom01" name="bio" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Year experience</label>
                            <input type="number" class="form-control" id="validationCustom01" name="year_exp" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="validationCustom01" name="nationality" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Civil status</label>
                            <input type="text" class="form-control" id="validationCustom01" name="civil_status" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">birthdate</label>
                            <input type="date" class="form-control" id="validationCustom01" name="birthdate" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-7">
                            <label for="validationCustom01" class="form-label">About yourself</label>
                            <textarea type="text" class="form-control h-150px" id="validationCustom01" name="about" required></textarea>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <h4 >Address Information</h4>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Country</label>
                            <input type="text" class="form-control" id="validationCustom01" name="country" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationCustom01" name="city" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Region</label>
                            <input type="text" class="form-control" id="validationCustom01" name="region" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Province</label>
                            <input type="text" class="form-control" id="validationCustom01" name="province" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="validationCustom01" name="barangay" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="validationCustom01" name="postal_code" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                        
                        <h4>Resume</h4>
                        <p>Attach your resume here</p>
                        <p class="file-note">PDF file only</p>

                        <div class="resume-upload">
                            <label for="resume-upload" class="upload-btn">Attach</label>
                            <input type="file" id="resume-upload" name="resume_pdf" class="form-control-file" accept=".pdf" required>
                            <p class="file-status" id="file-status">No file attached yet</p>
                        </div>
                        <script>
                            const fileInput = document.getElementById('resume-upload');
                            const fileStatus = document.getElementById('file-status');

                            fileInput.addEventListener('change', () => {
                                if (fileInput.files.length > 0) {
                                    fileStatus.textContent = fileInput.files[0].name; // Display the selected file name
                                    fileStatus.style.color = "#000"; // Change text color to black
                                } else {
                                    fileStatus.textContent = "No file attached yet";
                                    fileStatus.style.color = "gray";
                                }
                            });
                        </script>
                        <div class="btn_sub d-flex justify-content-between mt-3 mb-3">
                            <a href="Worker_step1.php" style="color:#000080"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
</svg></span>Go back to Step 1</a>
                            <button type="submit" class="btn submit-btn">Sign Up</button>
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


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Debugging: Check if POST data is received
    if (empty($_POST)) {
        die("Error: No form data received.");
    }

    // Required fields validation
    $required_fields = ['firstname', 'middlename', 'lastname', 'phone_no', 'bio', 'country', 'city', 
                        'region', 'province', 'barangay', 'postal_code', 'year_exp', 'nationality', 
                        'civil_status', 'birthdate', 'about'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            die("Error: Missing required field: $field");
        }
    }

    $worker_id = $_SESSION['worker_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $phone_no = $_POST['phone_no'];
    $bio = $_POST['bio'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $barangay = $_POST['barangay'];
    $postal_code = $_POST['postal_code'];
    $year_exp = $_POST['year_exp'];
    $nationality = $_POST['nationality'];
    $civil_status = $_POST['civil_status'];
    $birthdate = $_POST['birthdate'];
    $about = $_POST['about'];




    // Insert user profile data using a prepared statement
    $sql = "INSERT INTO tbl_worker_information 
        (worker_id, firstname, middlename, lastname, phone_no, bio, country, city, region, province, barangay, postalcode, workerAbout, year_experience, nationality, civilStatus, birthDate) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing SQL statement: " . $conn->error);
    }

    $stmt->bind_param("sssssssssssssssss", $worker_id, $firstname, $middlename, $lastname, $phone_no, $bio, $country, $city, 
                        $region, $province, $barangay, $postal_code, $about, $year_exp, 
                        $nationality, $civil_status, $birthdate);
    
    if (!$stmt->execute()) {
        die("Error inserting data into tbl_worker_information: " . $stmt->error);
    }
    
    // Check if a file was uploaded without errors
    if (!isset($_FILES["resume_pdf"]) || $_FILES["resume_pdf"]["error"] !== UPLOAD_ERR_OK) {
        die("Error: No file uploaded or an upload error occurred.");
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["resume_pdf"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // File security checks
    if ($fileType != "pdf" || $_FILES["resume_pdf"]["size"] > 2000000) {
        die("Error: Only PDF files less than 2MB are allowed.");
    }

    // Validate file MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $_FILES["resume_pdf"]["tmp_name"]);
    finfo_close($finfo);
    
    if ($mimeType !== "application/pdf") {
        die("Error: Uploaded file is not a valid PDF.");
    }

    // Ensure the upload directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move uploaded file
    if (!move_uploaded_file($_FILES["resume_pdf"]["tmp_name"], $target_file)) {
        die("Error uploading file. Check directory permissions.");
    }

        // Insert file information into the database
    $filename = $_FILES["resume_pdf"]["name"];
    $folderpath = $target_dir;
    $time_stamp = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tbl_worker_resume (worker_id, filename, folder_path, timestamp) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing SQL statement: " . $conn->error);
    }

    $stmt->bind_param("isss", $worker_id, $filename, $folderpath, $time_stamp);

    if (!$stmt->execute()) {
        die("Error inserting data into tbl_worker_resume: " . $stmt->error);
    }

    // Redirect to the next step upon success
    ob_end_clean();
    header("Location: Worker_step3.php");
    exit;
}

$conn->close();

?>