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
    <link rel="stylesheet" href="usermanagement/UserManagement.css" />
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
            <h3>User Management</h3>
        </div>

        <div class="locate">
            <div class="locate-title">
                <a href="#" id="userAccount">
                    Archived User Account
                </a>
            </div>
            <div class="locate-search">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search username" aria-label="Search username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">Search</span>
                </div>
            </div>
            <div class="locate-user">
                <div class="dropdown" id="userDropdownContainer">
                    <a class="btn btn-darkblue-user dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="userDropdown">
                        Select User
                    </a>
                    <ul class="dropdown-menu" id="userDropdownMenu">
                        <li><a class="dropdown-item" href="#" id="blueCollarOption" data-user="bluecollar">Blue Collar</a></li>
                        <li><a class="dropdown-item" href="#" id="clientOption" data-user="client">Client</a></li>
                        <li><a class="dropdown-item" href="#" id="adminOption" data-user="admin">Admin</a></li>
                    </ul>
                </div>

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

        <div class="table-container" id="tableContainer">
            <?php include 'usermanagement/archivedUser.php'; ?>
        </div>





    </main>
    <script src="usermanagement/userScript.js"></script>

</body>

</html>