    
<?php 
    $servername = "localhost";
    $username = "root"; // Change if needed
    $password = "";
    $database = "job_connext"; // Change if different
    
    $conn = new mysqli($servername, $username, $password, $database);
?>  
<?php 
  
  $job_postFOR_bluecol_skillQRY = "SELECT * FROM tbl_client_jobpost";
  $job_postFOR_bluecol_skillEXE = mysqli_query($conn, $job_postFOR_bluecol_skillQRY );
  $row = mysqli_fetch_assoc($job_postFOR_bluecol_skillEXE);
          $job_postFOR_bluecoll_skill = $row['job_offer'];
          
          
          if (!function_exists('jobpostFunction_for_collar_skill')) {
            function jobpostFunction_for_collar_skill() {
                global $job_postFOR_bluecoll_skill;
        
                $skills = [
                    'welder' => '../ClientPortal/skills/welder.php',
                    'plumber' => '../ClientPortal/skills/plumber.php',
                    'truck driver' => '../ClientPortal/skills/truck_driver.php',
                    'electrician' => '../ClientPortal/skills/electrician.php'
                ];
        
                // Make sure the skill is an array
                if (!is_array($job_postFOR_bluecoll_skill)) {
                    $job_postFOR_bluecoll_skill = [$job_postFOR_bluecoll_skill];
                }
        
                foreach ($job_postFOR_bluecoll_skill as $skill_name) {
                    $skill_name = strtolower(trim($skill_name)); // Normalize
                    if (isset($skills[$skill_name])) {
                        include $skills[$skill_name];
                    }
                }
            }
        }
        
        ?>
