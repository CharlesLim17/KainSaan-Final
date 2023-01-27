<?php
include "database.php";
 

$sql = "SELECT * FROM notif where status = 0   order by id ASC limit 10   ";
$result = $conn->query($sql);
 
 
if ($result->num_rows  ) {


    // output data of each row
    while($row = $result->fetch_assoc()) {
         

 

 $notif = $row['body'];

 if($notif == 'body1'){

    $body = '      <li
                                                class="submenu-item  " >
                                                <a href="alert.php?id='.$row['user_id'].'&alertid='.$row['user_id'].'" 
                                                    class="submenu-link alert alert-light-warning color-warning ">  
                           '.$row['title'].' - Pending Approval</a>
                                                
                                            </li>';
 }




 $notif = $row['body'];

 if($notif == 'body2'){

    $body = '      <li
                                                class="submenu-item  " >
                                                <a href="approved.php?id='.$row['user_id'].'&alertid='.$row['user_id'].'" 
                                                    class="submenu-link alert alert-light-success color-success ">  
                           '.$row['title'].' -  Approved</a>
                                                
                                            </li>';
 }





     echo  '
    
    '.$body.'
 
 

     '

     ;

    }

} else {

    echo "&nbsp; 0 notification";
}
 
$conn->close();

?>


 
 

 
 
 



 