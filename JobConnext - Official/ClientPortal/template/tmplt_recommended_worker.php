<?php
include "../db_con/db_connection.php";

$recommended_clientHOMEqry = "SELECT w.* FROM tbl_worker_information w 
                              JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id 
                              GROUP BY w.worker_id";
$recommended_clientHOMEexe = mysqli_query($conn, $recommended_clientHOMEqry);

while ($row = mysqli_fetch_assoc($recommended_clientHOMEexe)) {
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

    // Fetch skills for the current worker
    $skill_query = "SELECT skills FROM tbl_worker_skill_sets WHERE worker_id = '$Worker_id'";
    $skill_result = mysqli_query($conn, $skill_query);
    $colors = ['#D8CBFF', '#FFD8CB', '#CBFFD8', '#CBCDFF', '#FFCBE5', '#E0CBFF'];
    $i = 0;
    $skill_tags = '';

    while ($skill_row = mysqli_fetch_assoc($skill_result)) {
        $skill_name = htmlspecialchars($skill_row['skills']);
        $color = $colors[$i % count($colors)];
        $skill_tags .= "<span class='skill-tag1' style='background-color: $color;'>$skill_name</span> ";
        $i++;
    }

    $worker_fullname = htmlspecialchars("$Worker_Lname, $Worker_Fname $Worker_Mname");
?>

    <div class="container-fluid recommendation">
        <div class="row recommended-card">
            <div class="col-12">

                <div class="card-link "
                    data-type="worker"
                    data-workerid="<?= $Worker_id ?>"
                    data-name="<?= htmlspecialchars("$Worker_Lname, $Worker_Fname $Worker_Mname") ?>"
                    data-location="<?= htmlspecialchars("$Worker_barangay, $Worker_city, $Worker_province, $Worker_region, $Worker_country, $Worker_postalcode") ?>"
                    data-yoe="<?= htmlspecialchars($exp) ?>"
                    data-bio="<?= htmlspecialchars($Worker_Bio) ?>"
                    data-phone="<?= htmlspecialchars($Worker_Phone) ?>"
                    data-skills="<?= htmlspecialchars($skill_tags) ?>"
                    data-image="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg">

                    <div class="card" id="my-offer">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                </div>
                                <div class="details">
                                    <h3><?php echo $Worker_Lname . ", " . $Worker_Fname ?></h3>
                                    <p><?php echo "Worker ID: " . $Worker_id ?></p>
                                </div>
                            </div>
                            <div class="menu-container" onclick="event.stopPropagation(); toggleDropdown(this)">
                                <div class="menu">•••</div>
                                <div class="dropdown">
                                    <a href="#" onclick="reportPost(event, <?php echo $Worker_id?>)">Report</a>
                                </div>
                            </div>
                        </div>
                        <div class="skills">
                            <p><strong>Skills:</strong></p>
                            <?php echo $skill_tags; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
    </div>

<?php } ?>