<?php
    include"dbconfig.php";
    include "database.php";
 
    $sql = "SELECT * from notif where   status = '0' order by id DESC limit 10 ";
    if ($result = mysqli_query($conn, $sql)) {
    


    $rowcount = mysqli_num_rows( $result );

    if($rowcount == '0'){

        $count = ' <span id="noti_count" >  </span>';

    
    } if ($rowcount >= '11'){

$count = ' <span id="noti_count" class="badge bg-info" >10+</span>';

    }


     else {

        $count = ' <span id="noti_count" class="badge bg-info" > '.$rowcount.'</span>';

    }

}
 
 ?>

  <?php echo $count;?> 
 
