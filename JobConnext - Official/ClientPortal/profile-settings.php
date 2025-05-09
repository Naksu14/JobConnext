<?php
session_start();
include '../db_con/db_connection.php';

// Check if the user is logged in and has a client ID in the session
if (!isset($_SESSION['client_id'])) {

    header("Location: ../login.php");
    exit();
}

$client_id = $_SESSION['client_id'];

// Fetch client information (for name display)
$sql_info = "SELECT firstname, middlename, lastname FROM tbl_client_information WHERE client_id = ?";
$stmt_info = $conn->prepare($sql_info);
$stmt_info->bind_param("i", $client_id);
$stmt_info->execute();
$result_info = $stmt_info->get_result();
$client_info = $result_info->fetch_assoc();
$stmt_info->close();

// Fetch client email (for email display)
$sql_email = "SELECT email FROM tbl_client WHERE client_id = ?";
$stmt_email = $conn->prepare($sql_email);
$stmt_email->bind_param("i", $client_id);
$stmt_email->execute();
$result_email = $stmt_email->get_result();
$client_email = $result_email->fetch_assoc();
$stmt_email->close();

// Handle profile update form submission (for name and email)
if (isset($_POST['save_profile'])) {
    $new_firstname = $_POST['firstname'];
    $new_middlename = $_POST['middlename'];
    $new_lastname = $_POST['lastname'];
    $new_email = $_POST['email'];

    // Update tbl_client_information
    $sql_update_info = "UPDATE tbl_client_information SET firstname = ?, middlename = ?, lastname = ? WHERE client_id = ?";
    $stmt_update_info = $conn->prepare($sql_update_info);
    $stmt_update_info->bind_param("sssi", $new_firstname, $new_middlename, $new_lastname, $client_id);
    if ($stmt_update_info->execute()) {
        // Update tbl_client email
        $sql_update_email = "UPDATE tbl_client SET email = ? WHERE client_id = ?";
        $stmt_update_email = $conn->prepare($sql_update_email);
        $stmt_update_email->bind_param("si", $new_email, $client_id);
        if ($stmt_update_email->execute()) {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: "Success!",
                        text: "Email updated successfully.",
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        customClass: {
                            popup: "custom-toast-size"
                        }
                    })
                });
            </script>';

            header("Refresh:1");
        } else {
            echo '<div class="alert alert-danger" role="alert">Error updating email: ' . $stmt_update_email->error . '</div>';
        }
        $stmt_update_email->close();
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating profile information: ' . $stmt_update_info->error . '</div>';
    }

    $stmt_update_info->close();
}

// Handle password update form submission
if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Fetch the current hashed password from the database
    $sql_get_password = "SELECT hash_password FROM tbl_client WHERE client_id = ?";
    $stmt_get_password = $conn->prepare($sql_get_password);
    $stmt_get_password->bind_param("i", $client_id);
    $stmt_get_password->execute();
    $result_password = $stmt_get_password->get_result();
    $row_password = $result_password->fetch_assoc();
    $stmt_get_password->close();

    if ($row_password && password_verify($current_password, $row_password['hash_password'])) {
        // Hash the new password
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql_update_password = "UPDATE tbl_client SET hash_password = ? WHERE client_id = ?";
        $stmt_update_password = $conn->prepare($sql_update_password);
        $stmt_update_password->bind_param("si", $hashed_new_password, $client_id);

        if ($stmt_update_password->execute()) {
            echo '<div role="alert"></div>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
            Swal.fire({
                title: "Password Changed!",
                text: "Do you want to stay logged in?",
                icon: "success",
                showCancelButton: true,
                confirmButtonText: "Stay Logged In",
                cancelButtonText: "Logout",
                }).then((result) => {
                if (result.isConfirmed) {
                    return "";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = "../GuessPortal/Sign_In.php";
                }
                });
                </script>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error updating password: ' . $stmt_update_password->error . '</div>';
        }
        $stmt_update_password->close();
    } else {
        echo '<div class="alert alert-danger" role="alert">Incorrect current password.</div>';
    }
}

$conn->close();
?>
<?php if (isset($_GET['success'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const action = "<?php echo $_GET['success']; ?>";
            let title = '',
                text = '';

            if (action === "upload") {
                title = 'Uploaded!';
                text = 'Image has been uploaded successfully.';
            } else if (action === "delete") {
                title = 'Deleted!';
                text = 'Image has been deleted successfully.';
            }

            if (title && text) {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: 'success',
                    title: title,
                    text: text,
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'custom-toast-size' // Optional: for custom sizing
                    }
                });


                // Remove the query parameter after the alert
                setTimeout(() => {
                    const url = new URL(window.location);
                    url.searchParams.delete('success');
                    window.history.replaceState({}, document.title, url.pathname + url.search);
                }, 2100); // slightly longer than Swal timer
            }
        });
    </script>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-connext - Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/css/Client Css/profile-settings.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Assets/css/style.css">
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
    <?php include "../ClientPortal/components/navbar.php" ?>
    <div class="container-fluid main-content">
        <div class="container-fluid full-content">
            <div class="container-fluid header-1">
                <div class="header1-content">
                    <span id="acc_sett">
                        Account Settings
                    </span>
                    <p>Real-time information and activities of your properties</p>
                </div>
            </div>
            <div class="container-fluid header-2">
                <div class="header-left">
                    <img src="scriptsfordb/client_image.php?client_id=<?php echo $client_id; ?>" alt="Client Image">
                    <div class="header-left-title">
                        <span id="uname"><?php echo isset($client_info['firstname']) ? htmlspecialchars($client_info['firstname']) : 'N/A'; ?></span>
                        <span id="id-num">ID:<?php echo htmlspecialchars($client_id); ?></span>
                    </div>
                </div>
                <div class="header-right">
                    <form action="../ClientPortal/scriptsfordb/ClientUploadImage.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="client_id" value="<?php echo $client_id ?>">

                        <div class="button-upload">

                            <div class="inline-upload">
                                <input type="file" name="image" accept="image/jpeg, image/png, image/jpg" required>
                                <button type="submit" name="upload">Upload New Picture</button>
                            </div>

                            <div class="statement-down">
                                <span>jpg, png and jpeg with size 196 x 196 px, 15MB only</span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <form method="POST" action="">
                <div class="section-1">
                    <span>Full Name</span>
                </div>
                <div class="container-fluid name-reg">
                    <div class="row">
                        <div class="col">First Name
                            <input class="form-control" type="text" name="firstname" placeholder="" aria-label="default input example"
                                value="<?php echo isset($client_info['firstname']) ? htmlspecialchars($client_info['firstname']) : ''; ?>">
                        </div>
                        <div class="col">Last Name
                            <input class="form-control" type="text" name="lastname" placeholder="" aria-label="default input example"
                                value="<?php echo isset($client_info['lastname']) ? htmlspecialchars($client_info['lastname']) : ''; ?>">
                        </div>
                        <div class="col">Middle Name
                            <input class="form-control" type="text" name="middlename" placeholder="" aria-label="default input example"
                                value="<?php echo isset($client_info['middlename']) ? htmlspecialchars($client_info['middlename']) : ''; ?>">
                        </div>
                    </div>
                </div>
                <div class="section-2">
                    <span>Contact Email</span>
                </div>
                <div class="c-email">
                    <span>
                        Manage your accounts email address for the invoices
                    </span>
                    <div class="container-fluid email-reg">
                        <div class="row">
                            <div class="col">Email
                                <input class="form-control" type="email" name="email" placeholder="" aria-label="default input example"
                                    value="<?php echo isset($client_email['email']) ? htmlspecialchars($client_email['email']) : ''; ?>">
                            </div>
                            <div class="col">
                                <div class="button-email">
                                    <button type="submit" name="save_profile" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form method="POST" action="">
                <div class="section-3">
                    <span>Password</span>
                </div>
                <div class="c-email">
                    <span>
                        Change Password
                    </span>
                    <div class="container-fluid pass-reg">
                        <div class="row">
                            <div class="col">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                            </div>
                            <div class="col">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="new_password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-footer">
                    <div class="save-butt">
                        <button type="submit" name="change_password" class="btn btn-primary">
                            save
                        </button>
                    </div>
                </div>
                <br><br><br><br><br>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="../Assets/js/function.js"></script>
</body>

</html>