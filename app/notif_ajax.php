<?php
    include"dbconfig.php";
    include "database.php";
 
    $sql = "SELECT * from notif where user_id='".$_SESSION['id']."' and seen = '0' order by id DESC ";
    if ($result = mysqli_query($conn, $sql)) {
    


    $rowcount = mysqli_num_rows( $result );

    if($rowcount == '0'){

        $rowcount = '';
    } 

}
 
 ?>

  <em class="badge bg-blue2-dark"><?php echo $rowcount;?></em>
 
