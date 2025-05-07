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
    <link rel="stylesheet" href="dashboard/charts.css" />
    <link rel="stylesheet" href="navigationbar/Nav.css" />
    <link rel="stylesheet" href="sidebar/Sidebar.css" />
    <link rel="stylesheet" href="adminStyleComponents/AdminLandingPage.css" />

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
            <h3>Dashboard</h3>
        </div>
        <div class="cards">
            <div class="card">
                <div class="card-icon">
                    <img src="./imgforadmin/blueCollar.png" alt="">
                </div>
                <div class="card-content">
                    <div class="card-name">BLUE COLLAR</div>
                    <div class="card-number">543</div>
                </div>
            </div>
            <div class="card">
                <div class="card-icon">
                    <img src="./imgforadmin/Client.png" alt="">
                </div>
                <div class="card-content">
                    <div class="card-name">CLIENT</div>
                    <div class="card-number">123</div>
                </div>
            </div>
        </div>

        <div class="charts">
            <div class="chart" id="bar-graph">
                <h3>Blue Collar Application</h3>
                <canvas id="BCChart"></canvas>
            </div>
            <div class="chart" id="bar-graph">
                <h3>Client Project</h3>
                <canvas id="CCChart"></canvas>
            </div>
        </div>
        <div class=" charts charts2">
            <div class="chart" id="bar-graph">
                <h3>New Registered User</h3>
                <canvas id="newUserChart"></canvas>
            </div>
        </div>
        <div class=" charts charts2">
            <div class="chart" id="bar-graph">
                <h3>Job Categories</h3>
                <canvas id="JCChart"></canvas>
            </div>
        </div>
        <div class=" charts charts3">
            <div class="chart" id="bar-graph">
                <h3>Feedback</h3>
                <canvas id="FBChart" height="400"></canvas>

            </div>
            <button class="btn">Download Report</button>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dashboard/charts.js"></script>
</body>

</html>