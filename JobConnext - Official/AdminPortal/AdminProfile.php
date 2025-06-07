<?php
session_start();

// If admin is not logged in, redirect to sign-in page
if (!isset($_SESSION['Admin_id'])) {
    header("Location: ../GuessPortal/Sign_In.php");
    exit();
}

// Include your DB connection
include '../db_con/db_connection.php';

// Get admin ID from session
$adminId = $_SESSION['Admin_id'];

// Fetch admin info from the database
$sql = "SELECT a.email, i.full_name, i.phone, i.address, i.role, i.status, i.profile_image
        FROM tbl_admin a
        JOIN tbl_admin_information i ON a.Admin_id = i.Admin_id
        WHERE a.Admin_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $adminId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();
} else {
    die("Admin not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Profile</title>
    <link rel="icon" type="image/x-icon" href="imgforadmin/logo.png">
    <link href="../bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap.bundle.min.js"></script>
    <script src="./bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="adminStyleComponents/AdminProfile.css" />
    <link rel="stylesheet" href="navigationbar/Nav.css" />
    <link rel="stylesheet" href="sidebar/Sidebar.css" />
    <link rel="stylesheet" href="adminStyleComponents/AdminLandingPage.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

<?php include 'navigationbar/Nav.php'; ?>
<?php include 'sidebar/Sidebar.php'; ?>

<main class="main-content">
    <div class="container mt-5">
        <div class="row">
            <!-- Profile Card -->
            <div class="col-md-4">
                <div class="card ccenter">
                    <?php if (!empty($admin['profile_image'])): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($admin['profile_image']) ?>" class="card-img-top" alt="Admin Profile Picture" height="200" width="200">
                    <?php else: ?>
                        <img src="./imgforadmin/adminProfile.png" class="card-img-top" alt="Default Profile Picture" height="200" width="200">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title ccenter"><?= htmlspecialchars($admin['full_name']) ?></h5>
                        <p class="card-text ccenter"><?= htmlspecialchars($admin['role']) ?></p>
                        <br><br>
                        <p><strong>Email:</strong> <?= htmlspecialchars($admin['email']) ?></p>
                        <p><strong>Role:</strong> <?= htmlspecialchars($admin['role']) ?></p>
                        <p><strong>Status:</strong> <?= htmlspecialchars($admin['status']) ?></p>
                        <br><br>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                    </div>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="col-md-8">
                <div class="card">
                    <div class="Card-head">
                        <h4>Profile Information</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Full Name:</strong> <?= htmlspecialchars($admin['full_name']) ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($admin['email']) ?></li>
                            <li class="list-group-item"><strong>Phone:</strong> <?= htmlspecialchars($admin['phone']) ?></li>
                            <li class="list-group-item"><strong>Address:</strong> <?= htmlspecialchars($admin['address']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Edit Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="update_profile.php" enctype="multipart/form-data">
            <div class="modal-header">
                <h5>Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="Admin_Id" value="<?= $adminId ?>">
                <div class="mb-3"><label>Profile Image:</label>
                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                </div>
                <div class="mb-3"><label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($admin['full_name']) ?>" required>
                </div>
                <div class="mb-3"><label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($admin['email']) ?>" required>
                </div>
                <div class="mb-3"><label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($admin['phone']) ?>" required>
                </div>
                <div class="mb-3"><label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($admin['address']) ?>" required>
                </div>
                <div class="mb-3"><label>New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
