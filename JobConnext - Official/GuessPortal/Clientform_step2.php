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
        border: 2px solid #000080;
        /* Navy border */
        border-radius: 5px;
        font-size: 16px;
        color: #000080;
        /* Navy text */
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
        display: none;
        /* Hide the default file input */
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

                <form action="Clientform_step2.php" enctype="multipart/form-data" method="post" class="row g-3 needs-validation" novalidate>

                    <h3 class="poppins-bold text-center mb-5">Step 2: User Profile</h3>
                    <h4>Personal Information</h4>
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
                    <h4>Address Information</h4>
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
                    <h4>Company Information</h4>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="validationCustom01" name="company_name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Company Address</label>
                        <input type="text" class="form-control" id="validationCustom01" name="company_Address" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-7">
                        <label for="validationCustom01" class="form-label">About the Company</label>
                        <textarea class="form-control h-150px" id="validationCustom01" name="company_about" required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <script>

                    </script>
                    <div class="btn_sub d-flex justify-content-between mt-3 mb-3">
                        <a href="Clientform_step1.php" style="color:#000080"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
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
    $required_fields = ['firstname', 'middlename', 'lastname', 'phone_no', 'bio', 'country', 'city', 'region', 'province', 'barangay', 'postal_code', 'company_name', 'company_Address', 'company_about'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            die("Error: Missing required field: $field");
        }
    }

    $client_id = $_SESSION['client_id'];
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
    $company_name = $_POST['company_name'];
    $company_Address = $_POST['company_Address'];
    $company_about = $_POST['company_about'];

    // Insert user profile data using a prepared statement
    $sql1 = "INSERT INTO tbl_client_information 
    (client_id, firstname, middlename, lastname, phone_no, bio, country, city, region, province, barangay, postal_code)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("ssssssssssss", $client_id, $firstname, $middlename, $lastname, $phone_no, $bio, $country, $city, $region, $province, $barangay, $postal_code);

    if (!$stmt1->execute()) {
        die("Error inserting into tbl_client_information: " . $stmt1->error);
    }

    $sql2 = "INSERT INTO tbl_company_info (client_id, company_name, company_aboutUs, company_Address) VALUES (?, ?, ?, ?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ssss", $client_id, $company_name, $company_about, $company_Address);
    
    if (!$stmt2->execute()) {
        die("Error inserting into tbl_company_info: " . $stmt2->error);
    }
    
    // Redirect to the next step upon success
    ob_end_clean();
    header("Location: Clientform_step3.php");
    exit;
}

$conn->close();

?>