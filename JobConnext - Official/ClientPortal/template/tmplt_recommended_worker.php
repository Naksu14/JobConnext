<?php
include "../db_con/db_connection.php";

$recommended_clientHOMEqry = "SELECT w.* FROM tbl_worker_information w 
                              JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id 
                              GROUP BY w.worker_id";
$recommended_clientHOMEexe = mysqli_query($conn, $recommended_clientHOMEqry);


while ($row = mysqli_fetch_assoc($recommended_clientHOMEexe)) {
    $bluecollFnameHOME = $row['firstname'];
    $bluecollMnameHOME = $row['middlename'];
    $bluecollLnameHOME = $row['lastname'];
    $bluecoll_workerHOME = $row['worker_id'];

?>

    <div class="container-fluid recommendation">
        <div class="row recommended-card">
            <div class="col-12">
                <a href="worker_recommended.php" class="card-link">
                    <div class="card" id="my-offer">
                        <div class="job-header">
                            <div class="profile-info">
                                <div class="avatar">
                                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="Avatar">
                                </div>
                                <div class="details">
                                    <h3><?php echo $bluecollLnameHOME . ", " . $bluecollFnameHOME ?></h3>
                                    <p><?php echo "ID: " . $bluecoll_workerHOME ?></p>
                                </div>
                            </div>
                            <div class="menu">
                                •••
                            </div>
                        </div>
                        <div class="skills">
                            <p><strong>Skills:</strong></p>
                            <?php
                            // Fetch skills for the current worker
                            $skill_query = "SELECT skills FROM tbl_worker_skill_sets WHERE worker_id = '$bluecoll_workerHOME'";
                            $skill_result = mysqli_query($conn, $skill_query);
                            $colors = ['#D8CBFF', '#FFD8CB', '#CBFFD8', '#CBCDFF', '#FFCBE5', '#E0CBFF']; // Add more if needed
                            $i = 0;
                            while ($skill_row = mysqli_fetch_assoc($skill_result)) {
                                $color = $colors[$i % count($colors)];
                                echo "<span class='skill-tag1' style='background-color: $color;'>" . htmlspecialchars($skill_row['skills']) . "</span> ";
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <br>
    </div>

<?php } ?>