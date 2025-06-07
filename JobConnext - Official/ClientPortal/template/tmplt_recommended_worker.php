<?php
include "../db_con/db_connection.php";

$filter = $_POST['filters'] ?? null;

switch ($filter) {
    case 'date_asc':
        $condition = "ORDER BY w.worker_id ASC";
        break;
    default:
        $condition = "ORDER BY w.worker_id DESC";
        break;
}

$recommended_clientHOMEqry = "
    SELECT w.* 
    FROM tbl_worker_information w 
    JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id 
    GROUP BY w.worker_id 
    $condition
";
$recommended_clientHOMEexe = mysqli_query($conn, $recommended_clientHOMEqry);

$hasResults = false;

while ($row = mysqli_fetch_assoc($recommended_clientHOMEexe)) {
    $hasResults = true;

    $Worker_id = $row['worker_id'];
    $Worker_Fname = $row['firstname'];
    $Worker_Mname = $row['middlename'];
    $Worker_Lname = $row['lastname'];
    $Worker_Phone = $row['phone_no'];
    $Worker_Bio = $row['bio'];
    $Worker_country = $row['country'];
    $Worker_city = $row['city'];
    $Worker_region = $row['region'];
    $Worker_province = $row['province'];
    $Worker_barangay = $row['barangay'];
    $Worker_postalcode = $row['postalcode'];
    $exp = $row['year_experience'];

    // Fetch skills
    $skill_query = "SELECT skills FROM tbl_worker_skill_sets WHERE worker_id = ?";
    $stmt = $conn->prepare($skill_query);
    $stmt->bind_param("i", $Worker_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $colors = ['#8B89E9','#46CFA6','#FFAEC9','#A8E6CF','#DCE775','#FFCCBC','#B39DDB','#80DEEA','#F48FB1','#FFECB3'];
    $i = 0;
    $skill_tags = '';
    while ($skill_row = $result->fetch_assoc()) {
        $skill_name = htmlspecialchars($skill_row['skills']);
        $color = $colors[$i % count($colors)];
        $skill_tags .= "<span class='skill-tag1' style='background-color: $color;'>$skill_name</span> ";
        $i++;
    }
    $stmt->close();

    $worker_fullname = htmlspecialchars("$Worker_Lname, $Worker_Fname $Worker_Mname");
    $worker_location = htmlspecialchars("$Worker_barangay, $Worker_city, $Worker_province, $Worker_region, $Worker_country, $Worker_postalcode");
?>

<div class="container-fluid recommendation">
    <div class="row recommended-card">
        <div class="col-12">
            <div class="card-link"
                data-type="worker"
                data-workerid="<?= $Worker_id ?>"
                data-name="<?= $worker_fullname ?>"
                data-location="<?= $worker_location ?>"
                data-yoe="<?= htmlspecialchars($exp) ?>"
                data-bio="<?= htmlspecialchars($Worker_Bio) ?>"
                data-phone="<?= htmlspecialchars($Worker_Phone) ?>"
                data-skills="<?= htmlspecialchars($skill_tags) ?>"
                data-image="../Assets/image/worker_user.png"
                onclick="handleWorkerClick(event)">

                <div class="card" id="my-offer">
                    <div class="job-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="./scriptsfordb/workerImage.php?worker_id=<?= $Worker_id ?>" alt="Worker Image">
                            </div>
                            <div class="details">
                                <h3><?= htmlspecialchars("$Worker_Lname, $Worker_Fname") ?></h3>
                                <p>Worker ID: <?= $Worker_id ?></p>
                            </div>
                        </div>
                        <div class="menu-container" onclick="event.stopPropagation(); toggleDropdown(this)">
                            <div class="menu">•••</div>
                            <div class="dropdown">
                                <a href="#" onclick="reportPost(event, <?= $Worker_id ?>)">Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="skills">
                        <p><strong>Skills:</strong></p>
                        <?= $skill_tags ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<?php } ?>

<?php if (!$hasResults): ?>
    <div class="no-worker-message text-center p-6"><strong>No workers found.</strong></div>
<?php endif; ?>
