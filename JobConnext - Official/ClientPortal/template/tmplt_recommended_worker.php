
<?php

include "../db_con/db_connection.php";

$recommended_clientHOMEqry = "SELECT w.* FROM tbl_worker_information w JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id WHERE s.skills = 'Welder'";
$recommended_clientHOMEexe = mysqli_query($conn, $recommended_clientHOMEqry);
while ($row = mysqli_fetch_assoc(result: $recommended_clientHOMEexe)) {
    $bluecollFnameHOME = $row['firstname'];
    $bluecollMnameHOME = $row['middlename'];
    $bluecollLnameHOME = $row['lastname'];
    $bluecoll_workerHOME = $row['worker_id'];


    $recommended_companynameHOME = "SELECT * FROM tbl_client_information";
    $recommended_companynameEXE = mysqli_query($conn, $recommended_companynameHOME);
    $recommended_companynameGET = mysqli_fetch_assoc($recommended_companynameEXE);
    $bluecoll_companynameHOME = $recommended_companynameGET['firstname'];

    //chip function Recommended Worker(separate file)
    include '../ClientPortal/template/tmplt_chipCOLLAR_SKILLS.php';
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
                            <span class="skill-tag"><?php echo collar_skill(); ?></span>
                        </div>
                    </div>-
                </a>
            </div>
        </div>
        <br>
    </div>

<?php } ?>