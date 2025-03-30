    
<?php 
    $servername = "localhost";
    $username = "root"; // Change if needed
    $password = "";
    $database = "job_connext"; // Change if different
    
    $conn = new mysqli($servername, $username, $password, $database);
?>  
<?php 
  
  $bluecol_skillQRY = "SELECT * FROM tbl_worker_skill_sets";
  $bluecol_skillEXE = mysqli_query($conn, $bluecol_skillQRY );
  $bluecol_skillGET = mysqli_fetch_assoc($bluecol_skillEXE);
          $bluecoll_skill = $bluecol_skillGET['skills'];

  if (!function_exists('collar_skill')){
      function collar_skill(){
      global $bluecoll_skill;

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
