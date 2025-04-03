    
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
                    ['welder', '../ClientPortal/skills/welder.php'],
                    ['plumber', '../ClientPortal/skills/plumber.php'],
                    ['truck driver', '../ClientPortal/skills/truck_driver.php'],
                    ['electrician', '../ClientPortal/skills/electrician.php'] // Default case
                ];
        

                if (!is_array($job_postFOR_bluecoll_skill)) {
                    $job_postFOR_bluecoll_skill = [$job_postFOR_bluecoll_skill]; // Convert to array if it's a single skill
                }
        

                foreach ($skills as $skill) {
                    if (in_array($skill[0], $job_postFOR_bluecoll_skill)) {                // Include files for all matching skills
                        echo include $skill[1];
                    }
                }
            }
        }
        ?>
