<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobConnext Administrator</title>
    <!--icon website-->
    <link rel="icon" type="image/x-icon" href="imgforadmin/logo.png">

    <!--bootstrap-->
    <link href="../bootstrap.min.css" rel="stylesheet">
    <!-- javascript  -->
    <script src="../bootstrap.bundle.min.js"></script>
    <script src="./bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="AdminProfile.css" />
    <link rel="stylesheet" href="navigationbar/Nav.css" />
    <link rel="stylesheet" href="sidebar/Sidebar.css" />
    <link rel="stylesheet" href="AdminLandingPage.css" />

    <!--icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--SweetAlert2-->
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
                        <img src="./imgforadmin/adminProfile.png" class="card-img-top" alt="Admin Profile Picture" height="200" width="200">
                        <div class="card-body">
                            <h5 class="card-title ccenter">Lord Raven</h5>
                            <p class="card-text ccenter">JobConnext Administrator</p>
                            <br><br>
                            <p><strong>Email:</strong> adminRaven@example.com</p>
                            <p><strong>Role:</strong> Admin</p>
                            <p><strong>Status:</strong> Active</p>
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
                                <li class="list-group-item"><strong>Full Name:</strong> Lord Raven</li>
                                <li class="list-group-item"><strong>Email:</strong> adminRaven@example.com</li>
                                <li class="list-group-item"><strong>Phone:</strong> +123 456 7890</li>
                                <li class="list-group-item"><strong>Address:</strong> 123 perpetual Mambog Bacoor Cavite City</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal for Edit Profile -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" value="Lord Raven" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="adminRaven@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" value="+123 456 7890" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" value="123 perpetual Mambog Bacoor Cavite City" required>
                        </div>
                        <!-- Account Email and Password -->
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">User Account Email</label>
                            <input type="email" class="form-control" id="userEmail" value="admin@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter new password">
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JS for SweetAlert2 (for form submission, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>