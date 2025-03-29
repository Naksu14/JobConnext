    
<?php 
    $servername = "localhost";
    $username = "root"; // Change if needed
    $password = "";
    $database = "job_connext"; // Change if different
    
    $conn = new mysqli($servername, $username, $password, $database);
?>    
    
    
    <?php 
        $recommended_clientHOMEqry = "SELECT w.* FROM tbl_worker_information w JOIN tbl_worker_skill_sets s ON w.worker_id = s.worker_id WHERE s.skills = 'Welder'";
        $recommended_clientHOMEexe= mysqli_query($conn, $recommended_clientHOMEqry);
            while($row = mysqli_fetch_assoc(result: $recommended_clientHOMEexe)){
                $bluecollFnameHOME = $row['firstname'];
                $bluecollMnameHOME = $row['middlename'];
                $bluecollLnameHOME = $row['lastname'];  
                $bluecoll_workerHOME = $row['worker_id'];

                
        $recommended_companynameHOME = "SELECT * FROM tbl_client_information";
        $recommended_companynameEXE = mysqli_query($conn, $recommended_companynameHOME);
        $recommended_companynameGET = mysqli_fetch_assoc($recommended_companynameEXE);
                $bluecoll_companynameHOME = $recommended_companynameGET['company_name'];
        
        $bluecol_skillQRY = "SELECT * FROM tbl_worker_skill_sets";
        $bluecol_skillEXE = mysqli_query($conn, $bluecol_skillQRY );
        $bluecol_skillGET = mysqli_fetch_assoc($bluecol_skillEXE);
                $bluecoll_skill = $bluecol_skillGET['skills'];

        if (!function_exists('collar_skill')){
            function collar_skill($bluecoll_skill){
                if($bluecoll_skill == 'welder'){
                    echo include '../ClientPortal/skills/welder.php';
                }elseif($bluecoll_skill == 'plumber'){
                    echo include '../ClientPortal/skills/plumber.php';
                }elseif($bluecoll_skill == 'truck driver'){
                    echo include '../ClientPortal/skills/truck_driver.php';
                }else{
                    echo include '../ClientPortal/skills/electrician.php';
                }
            }  
        }        
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
                                    <h3><?php echo $bluecollLnameHOME.", ". $bluecollFnameHOME ?></h3>
                                    <p><?php echo "ID: ". $bluecoll_workerHOME ?></p>
                                </div>
                            </div>
                            <div class="menu">
                                •••
                            </div>
                        </div>
                        <div class="skills">
                            <p><strong>Skills:</strong></p>
                            <span class="skill-tag"><?php echo collar_skill($bluecoll_skill); ?></span>
                        </div>
                    </div>
                </a>
            </div>
    </div>
    <?php } ?>