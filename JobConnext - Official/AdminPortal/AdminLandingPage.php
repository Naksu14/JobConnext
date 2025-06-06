<?php
session_start();
include '../db_con/db_connection.php';

$query = "SELECT COUNT(*) as BlueCollarWorkerUser FROM tbl_blue_collar_worker";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $Count_BlueCollarWorkerUser = $row['BlueCollarWorkerUser'];
}

$query = "SELECT COUNT(*) as clientUser FROM tbl_client";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $Count_clientUser = $row['clientUser'];
}

// Fetch applicant status counts
$approved = $pending = $rejected = 0;
$applicantQuery = "SELECT status, COUNT(*) as count FROM tbl_applicants GROUP BY status";
$stmt = $conn->prepare($applicantQuery);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    switch (strtolower($row['status'])) {
        case 'accepted':
            $accepted = (int)$row['count'];
            break;
        case 'pending':
            $pending = (int)$row['count'];
            break;
        case 'rejected':
            $rejected = (int)$row['count'];
            break;
    }
}

// Count job_status values
$active = $ongoing = $inactive = 0;
$statusQuery = "SELECT job_status, COUNT(*) as count FROM tbl_client_jobpost GROUP BY job_status";
$stmt = $conn->prepare($statusQuery);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    switch (strtolower($row['job_status'])) {
        case 'active':
            $active = (int)$row['count'];
            break;
        case 'ongoing':
            $ongoing = (int)$row['count'];
            break;
        case 'inactive':
            $inactive = (int)$row['count'];
            break;
    }
}

// Clients per month
$clientData = [];
$months = [];

$query = "
    SELECT DATE_FORMAT(Client_created_at, '%M') AS month, COUNT(*) AS count
    FROM tbl_client
    WHERE YEAR(Client_created_at) = YEAR(CURDATE())
    GROUP BY MONTH(Client_created_at)
    ORDER BY MONTH(Client_created_at)
";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $months[] = $row['month']; // e.g. January, February
    $clientData[] = (int)$row['count'];
}

// Blue-Collar Workers per month
$workerData = [];

$query = "
    SELECT DATE_FORMAT(Worker_created_at, '%M') AS month, COUNT(*) AS count
    FROM tbl_blue_collar_worker
    WHERE YEAR(Worker_created_at) = YEAR(CURDATE())
    GROUP BY MONTH(Worker_created_at)
    ORDER BY MONTH(Worker_created_at)
";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $workerData[] = (int)$row['count'];
}


?>
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
                    <div class="card-number"> <?php echo $Count_BlueCollarWorkerUser; ?></div>
                </div>
            </div>
            <div class="card">
                <div class="card-icon">
                    <img src="./imgforadmin/Client.png" alt="">
                </div>
                <div class="card-content">
                    <div class="card-name">CLIENT</div>
                    <div class="card-number"><?php echo $Count_clientUser; ?></div>
                </div>
            </div>
        </div>

        <div class="charts">
            <div class="chart" id="bar-graph">
                <h3>Blue Collar Application</h3>
                <canvas id="BCChart"></canvas>
            </div>
            <div class="chart" id="bar-graph">
                <h3>Client Job Post</h3>
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
    <script>
        const months = <?php echo json_encode($months); ?>;
        const clientData = <?php echo json_encode($clientData); ?>;
        const workerData = <?php echo json_encode($workerData); ?>;

        new Chart(newUserChart, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                        label: 'Clients',
                        data: clientData,
                        backgroundColor: 'rgba(228, 98, 50, 0.2)',
                        borderColor: '#E46232',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Blue-Collar Workers',
                        data: workerData,
                        backgroundColor: 'rgba(32, 138, 174, 0.2)',
                        borderColor: '#208AAE',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'New Registered Users: Clients and Blue-Collar Workers'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Registrations'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    }
                }
            }
        });



        const applicantStatusData = {
            accepted: <?php echo $accepted; ?>,
            pending: <?php echo $pending; ?>,
            rejected: <?php echo $rejected; ?>
        };

        const ctxBCChart = document.getElementById('BCChart');





        new Chart(ctxBCChart, {
            type: 'bar',
            data: {
                labels: ['Accepted', 'Pending', 'Rejected'],
                datasets: [{
                    label: 'Applications',
                    data: [
                        applicantStatusData.accepted,
                        applicantStatusData.pending,
                        applicantStatusData.rejected
                    ],
                    backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Applicant Status Distribution'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Applicants'
                        }
                    }
                }
            }
        });

        const jobPostStatusData = {
            active: <?php echo $active; ?>,
            ongoing: <?php echo $ongoing; ?>,
            inactive: <?php echo $inactive; ?>
        };
        
        const ctxCCChart = document.getElementById('CCChart');

        new Chart(ctxCCChart, {
        type: 'bar',
        data: {
            labels: ['Active', 'Ongoing', 'Done'],
            datasets: [{
            label: 'Job Posts',
            data: [
                jobPostStatusData.active,
                jobPostStatusData.ongoing,
                jobPostStatusData.inactive
            ],
            backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
            borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Client Job Post Status'
            }
            },
            scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Number of Job Posts' }
            }
            }
        }
        });


    </script>

</body>

</html>