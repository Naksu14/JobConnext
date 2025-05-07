<?php
session_start();
include '../db_con/db_connection.php';

$companyName = "Guest";
$clientAboutUs = "You are not logged in.";
$clientAddress = $clientPhoneNumber = $clientEmail = "N/A";

if (isset($_SESSION['client_id'])) {
    $clientId = $_SESSION['client_id'];

    // Combined query for tbl_company_info
    $query = "SELECT company_name, company_aboutUs, company_Address FROM tbl_company_info WHERE client_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $companyName = $row['company_name'];
            $clientAboutUs = $row['company_aboutUs'];
            $clientAddress = $row['company_Address'];
        }
        $stmt->close();
    } else {
        $companyName = "Error fetching company";
    }

    // Phone number from tbl_client_information
    $query = "SELECT phone_no FROM tbl_client_information WHERE client_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $clientId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $clientPhoneNumber = $row['phone_no'];
    }
    $stmt->close();

    // Email from tbl_client
    $query = "SELECT email FROM tbl_client WHERE client_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $clientId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $clientEmail = $row['email'];
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Job-connext - Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Assets/css/Client Css/client_profile.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@400;600&display=swap">
    <link rel="icon" href="../Assets/image/Logo1.png" type="image/png" sizes="32x32">
</head>

<body>
<?php include "../ClientPortal/components/navbar.php"; ?>

<div class="container-fluid main-content">
    <div class="settings-container">
        <a href="profile-settings.php">
            <img src="../Assets/image/Settings.png" alt="Settings Icon">
        </a>
    </div>

    <div class="container-fluid full-content">
        <div class="container-fluid profile-content">
            <div class="client-photo">
                <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Client Photo">
                <div class="name-title">
                    <span>
                        <?php echo htmlspecialchars($companyName); ?>
                    </span>
                    <h6>Construction</h6>
                </div>
            </div>
        </div>

        <div class="container-fluid profile-nav">
            <a href="client_profile.php" id="active-nav">Overview</a>
            <a href="profile-company.php">Company Work</a>
        </div>
         <!-- Edit Icon -->
        <div class="create-header">
            <img src="../Assets/image/Create.png" alt="Edit" id="edit-trigger" style="cursor:pointer;">
        </div>

        <!-- About Us -->
        <div class="about-us">
            <div class="about-us-header"><span>About Us</span></div>
            <p id="about-text"><?php echo nl2br(htmlspecialchars($clientAboutUs)); ?></p>
            <textarea id="about-input" class="form-control d-none"><?php echo htmlspecialchars($clientAboutUs); ?></textarea>
        </div>

        <!-- Address -->
        <div class="address">
            <div class="address-header"><span>Address</span></div>
            <div class="address-content">
                <h6 id="header-address">
                    <img src="../Assets/image/Location.png" alt="Location Icon">
                    <p id="address-text"><?php echo htmlspecialchars($clientAddress); ?></p>
                    <input type="text" id="address-input" class="form-control d-none" value="<?php echo htmlspecialchars($clientAddress); ?>">
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
                        src="https://maps.google.com/maps?q=<?php echo urlencode($clientAddress); ?>&output=embed">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="contact">
            <div class="contact-header"><span>Contact Information</span></div>
            <div class="contact-content">
                <ul>
                    <li>Phone no.: 
                        <span id="phone-text"><?php echo htmlspecialchars($clientPhoneNumber); ?></span>
                        <input type="text" id="phone-input" class="form-control d-none" value="<?php echo htmlspecialchars($clientPhoneNumber); ?>">
                    </li>
                    <li>Email Address: 
                        <span id="email-text"><?php echo htmlspecialchars($clientEmail); ?></span>
                        <input type="email" id="email-input" class="form-control d-none" value="<?php echo htmlspecialchars($clientEmail); ?>">
                    </li>
                    <li>Social Media Links:
                        <span id="social-text"><?php echo htmlspecialchars($clientEmail); ?></span>
                        <input type="text" id="social-input" class="form-control d-none" value="<?php echo htmlspecialchars($clientEmail); ?>">
                    </li>
                </ul>
                <button id="save-btn" class="btn btn-primary btn-md d-none mt-4" style="padding: 5px 20px 5px 20px;"><b>Save</b></button>
                <br><br><br><br><br>
            </div>
        </div>

    </div>
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
    const email = document.getElementById('email-input').value;
    const social = document.getElementById('social-input').value;

    fetch('template/updateprofile.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ about, address, phone, email, social })
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
            document.getElementById('email-text').innerText = email;
            document.getElementById('social-text').innerText = social;

            document.getElementById('map-frame').src = `https://maps.google.com/maps?q=${encodeURIComponent(address)}&output=embed`;

            toggleEditMode(false);
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

    toggleClass('email-text', !editMode);
    toggleClass('email-input', editMode);

    toggleClass('social-text', !editMode);
    toggleClass('social-input', editMode);

    toggleClass('save-btn', editMode);
}
</script>


</body>
</html>
