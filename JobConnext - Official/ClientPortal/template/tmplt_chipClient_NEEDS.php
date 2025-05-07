<?php

include "../db_con/db_connection.php";
  
  $job_postFOR_bluecol_skillQRY = "SELECT * FROM tbl_client_jobpost";
  $job_postFOR_bluecol_skillEXE = mysqli_query($conn, $job_postFOR_bluecol_skillQRY );
  $row = mysqli_fetch_assoc($job_postFOR_bluecol_skillEXE);
          $job_postFOR_bluecoll_skill = $row['job_offer'];

  if (!function_exists('jobpostFunction_for_collar_skill')){
      function jobpostFunction_for_collar_skill(){
      global $job_postFOR_bluecoll_skill;

          if($job_postFOR_bluecoll_skill == 'welder'){
              echo include '../ClientPortal/skills/welder.php';
          }elseif($job_postFOR_bluecoll_skill == 'plumber'){
              echo include '../ClientPortal/skills/plumber.php';
          }elseif($job_postFOR_bluecoll_skill == 'truck driver'){
              echo include '../ClientPortal/skills/truck_driver.php';
          }else{
              echo include '../ClientPortal/skills/electrician.php';
          }
      }  
  }          
?>
