<?php
      require 'database.php';

      $query = "SELECT * FROM `sip_announces`";

      if ($is_query_run = mysqli_query($mysqli,$query)) 
      { 
        $query_executed = $is_query_run->fetch_assoc();
        //while ($query_executed = $is_query_run->fetch_assoc()) 
        //{  
        echo $query_executed['id'].' '; 
        echo $query_executed['achievment_text'].' '; 
        echo $query_executed['year_of_achievement'].'<br>'; 
        //} 

        $query_executed = $is_query_run->fetch_assoc();
        echo $query_executed['id'].' '; 
        echo $query_executed['achievment_text'].' '; 
        echo $query_executed['year_of_achievement'].'<br>'; 
      } 
      else
      { 
          echo "Error in execution!"; 
      } 
    ?>