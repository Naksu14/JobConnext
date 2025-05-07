
<?php 

include "../db_con/db_connection.php";
  
  $bluecol_skillQRY = "SELECT * FROM tbl_worker_skill_sets";
  $bluecol_skillEXE = mysqli_query($conn, $bluecol_skillQRY );
  $bluecol_skillGET = mysqli_fetch_assoc($bluecol_skillEXE);
          $bluecoll_skill = $bluecol_skillGET['skills'];

  if (!function_exists('collar_skill')){
      function collar_skill(){
        global $bluecoll_skill;

          if($bluecoll_skill == 'welder'){
            include_once  '../ClientPortal/skills/welder.php';
          }elseif($bluecoll_skill == 'plumber'){
            include_once  '../ClientPortal/skills/plumber.php';
          }elseif($bluecoll_skill == 'truck driver'){
            include_once  '../ClientPortal/skills/truck_driver.php';
          }else{
            include_once  '../ClientPortal/skills/electrician.php';
          }
      }  
  }          
?>
