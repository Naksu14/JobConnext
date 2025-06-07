<?php
include '../db_con/db_connection.php';

$clientId = (int) $_SESSION['client_id'];
$filter = $_POST['filterothers'] ?? null;
$hasResults = false;

switch ($filter) {
    case 'date_asc':
        $condition = "ORDER BY job_post_id ASC";
        break;
    case 'active':
        $condition = "AND job_status = 'Active' ORDER BY job_post_id DESC";
        break;
    case 'ongoing':
        $condition = "AND job_status = 'Ongoing' ORDER BY job_post_id DESC";
        break;
    default:
        $condition = "ORDER BY job_post_id DESC";
        break;
}

$job_offeredQRY = "SELECT * FROM tbl_client_jobpost WHERE client_id != $clientId AND job_status != 'InActive' $condition";
$job_offeredEXE = mysqli_query($conn, $job_offeredQRY);

while ($row = mysqli_fetch_assoc($job_offeredEXE)) {
    $hasResults = true;
    $other_client_id = (int) $row['client_id'];
    $job_post_id = (int) $row['job_post_id'];
    $job_salary_start = $row['salary_start'];
    $job_salary_end = $row['salary_end'];
    $num_applicants = $row['applicants'];
    $yr_Exp = $row['year_exp'];
    $job_loc = $row['location'];
    $job_description = $row['description'];
    $date_posted = $row['start_posted'];
    $date_deadline = $row['deadline'];
    $job_offer = $row['job_offer'];
    $job_status = $row['job_status'];

    // Get total applicants
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM tbl_applicants WHERE job_post_id = ?");
    $stmt->bind_param("i", $job_post_id);
    $stmt->execute();
    $stmt->bind_result($Count_Applicants_Applied);
    $stmt->fetch();
    $stmt->close();

    // Get company name
    $company_name = '';
    $job_offered_companyEXE = mysqli_query($conn, "SELECT * FROM tbl_company_info WHERE client_id = $other_client_id");
    if ($company_row = mysqli_fetch_assoc($job_offered_companyEXE)) {
        $company_name = $company_row['company_name'];
    }

    // Get client email
    $stmt = $conn->prepare("SELECT email FROM tbl_client WHERE client_id = ?");
    $stmt->bind_param("i", $other_client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $displayEmail = '';
    if ($rowEmail = $result->fetch_assoc()) {
        $displayEmail = $rowEmail['email'];
    }
    $stmt->close();

    // Get client skill sets
    $colors = ['#8B89E9', '#46CFA6', '#FFAEC9', '#A8E6CF', '#DCE775', '#FFCCBC', '#B39DDB', '#80DEEA', '#F48FB1', '#FFECB3'];
    $skill_qry = "SELECT * FROM tbl_client_skills_sets WHERE client_id = $other_client_id";
    $skill_exe = mysqli_query($conn, $skill_qry);

    $i = 0;
    $skill_tags_html = '';
    $skill_names = [];

    while ($skill_row = mysqli_fetch_assoc($skill_exe)) {
        $skill_name = htmlspecialchars($skill_row['skills']);
        $color = $colors[$i % count($colors)];
        $skill_tags_html .= "<span class='skill-tag1' style='background-color: $color;'>$skill_name</span> ";
        $skill_names[] = $skill_name;
        $i++;
    }

    // Status color logic
    $statuscolor = match ($job_status) {
        'Active' => 'green',
        'Ongoing' => 'blue',
        default => 'red',
    };

    $status = htmlspecialchars($job_status);
    $skill_names_plain = implode(', ', $skill_names);
    $formattedSalary = 'Php ' . number_format($job_salary_start) . ' - Php ' . number_format($job_salary_end);
?>

    <div class="card-link" 
        data-type="other-job"
        data-clientid="<?= $other_client_id ?>"
        data-jobid="<?= $job_post_id ?>"
        data-companyname="<?= htmlspecialchars($company_name) ?>"
        data-location="<?= htmlspecialchars($job_loc) ?>"
        data-salary="<?= $formattedSalary ?>"
        data-job-status="<?= $status ?>"
        data-applied="<?= htmlspecialchars($Count_Applicants_Applied) ?>"
        data-email="<?= htmlspecialchars($displayEmail) ?>"
        data-dates="<?= htmlspecialchars($date_posted . ' - ' . $date_deadline) ?>"
        data-description="<?= htmlspecialchars($job_description) ?>"
        data-skills="<?= htmlspecialchars($skill_names_plain) ?>"
        data-yoe="<?= $yr_Exp ?>"
        onclick="handleCardClick(event)"
    >
        <div class="card" id="my-offer">
            <div class="job-header">
                <div class="profile-info">
                    <div class="avatar">
                        <img src="./scriptsfordb/client_image.php?client_id=<?= $other_client_id ?>" alt="Client Image">
                    </div>
                    <div class="details">
                        <h3><?= htmlspecialchars($company_name) ?></h3>
                        <p>
                            • <strong>Php:</strong> <?= number_format($job_salary_start) . ' - ' . number_format($job_salary_end) ?>
                            • <strong>Applicants Needed:</strong> <?= $num_applicants ?>
                            <span style="color: <?= $statuscolor ?>;">• <?= $status ?></span>
                        </p>
                    </div>
                </div>
                <div class="job-dates">
                    <div class="menu-container" onclick="event.stopPropagation(); toggleDropdown(this)">
                        <div class="menu">•••</div>
                        <div class="dropdown">
                            <a href="#" onclick="reportPost(event, <?= $other_client_id ?>, <?= $job_post_id ?>)">Report</a>
                        </div>
                    </div>
                    <p><?= htmlspecialchars($date_posted . ' - ' . $date_deadline) ?></p>
                </div>
            </div>
            <div class="job-body">
                <div class="info">
                    <p><strong>Location:</strong> <?= htmlspecialchars($job_loc) ?></p>
                    <p><strong>Years of experience:</strong> <?= $yr_Exp ?></p>
                </div>
                <div class="skills">
                    <p><strong>Skills needed:</strong></p>
                    <?= $skill_tags_html ?>
                </div>
            </div>
            <div class="job-footer">
                <button class="applied">
                    <?= $Count_Applicants_Applied ?> Applicant
                </button>
            </div>
        </div>
    </div>
    <br>

<?php
}

if (!$hasResults) {
    echo "<div class='no-job-message text-center p-6'><strong>No job post found.</strong></div>";
}
?>
