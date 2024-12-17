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
    <link rel="stylesheet" href="contentmoderation/contentmoderation.css" />
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
        <div class="main-title">
            <h3>Content Moderation</h3>
        </div>

        <div class="review-content">
            <div class="review-title">
                Reported Post
            </div>
            <div class="review-content-header">
                <div class="review-search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search username" aria-label="Search username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">Search</span>
                    </div>
                </div>
                <div class="review-filter">
                    <div class="btn-group" id="filterGroup">
                        <button type="button" class="btn btn-darkblue" id="filterButton">Filter</button>
                        <button type="button" class="btn btn-darkblue dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" id="filterDropdownToggle">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" id="filterDropdownMenu">
                            <li><a class="dropdown-item" href="#" id="sortByName">Sort by Name</a></li>
                            <li><a class="dropdown-item" href="#" id="sortByDate">Sort by Date</a></li>
                            <li><a class="dropdown-item" href="#" id="filterByStatus">Filter by Status</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="post-content">
                <div class="post-card">
                    <!-- Upper Section: Profile and Menu -->
                    <div class="post-header">
                        <div class="profile-info">
                            <img src="./imgforadmin/logo.png" alt="Profile Image" class="profile-img">
                            <div class="profile-details">
                                <h4>Block Chain</h4>
                                <p class="freelance-info">Company</p>
                            </div>
                        </div>
                        <div class="post-menu">
                            <span class="posted-time">2 days ago</span>
                        </div>
                    </div>

                    <!-- Middle Section: Job Details -->
                    <div class="job-details">
                        <p><strong>Salary:</strong> <br>$50,000 - $70,000</p>
                        <p><strong>Location:</strong> <br>Remote</p>
                        <p><strong>Experience:</strong> <br>3+ years</p>
                    </div>


                    <!-- Qualification and Skills -->
                    <div class="qualifications">
                        <p><strong>Qualifications:</strong> Bachelor's Degree in Computer Science</p>
                        <p><strong>Skills:</strong><br> <span class="skill-color">Electician</span> <span class="skill-color">Welder</span></p>
                    </div>

                    <!-- Responsibilities -->
                    <div class="responsibilities">
                        <p><strong>Responsibilities:</strong></p>
                        <ul>
                            <li>Design and develop blockchain solutions</li>
                            <li>Ensure the security of decentralized applications</li>
                            <li>Collaborate with cross-functional teams</li>
                        </ul>
                    </div>
                    <br>

                    <!-- Comments and Rating -->
                    <div class="comments-rating">
                        <p><strong>Comments:</strong></p>

                        <div class="comment-card">
                            <div class="comment-content">
                                <div class="profile-info">
                                    <img src="./imgforadmin/adminprofile.png" class="profile-img">
                                    <div class="profile-details">
                                        <h4>Rhanel Buclares</h4>
                                        <p class="freelance-info">Freelance</p>
                                    </div>
                                </div>
                                <div class="post-menu">
                                    <span class="posted-time">5 mins ago</span>
                                    <button class="btn btn-menu">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                </div>
                            
                            </div>
                            <div class="comments">
                                <div class="rating">
                                    <span><b>Rate:</b></span>
                                    <button class="btn btn-rate">⭐⭐⭐⭐⭐</button>
                                </div>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
                            </div>
                        </div>

                        

                    </div><br>
                    <div class="report-sign">
                        This post has not been published due to rule violations!
                    </div>
                </div>
            </div>

        </div>




    </main>

</body>

</html>