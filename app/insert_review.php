<?php

 
include "database.php";
 

$user_id=$_POST['user_id'];
$name_estab=$_POST['name_estab'];
$name=$_POST['name'];
$food=$_POST['food'];
$ratings=$_POST['ratings'];
$review=$_POST['review'];
$fullname=$_POST['fullname'];
$months=$_POST['months'];
$date=$_POST['date'];
$years=$_POST['years'];
$time=$_POST['time'];
 

$sql="INSERT INTO `reviews` (`user_id`,`fullname`, `review`, `ratings`, `name_estab`, `food`, `months`, `date`, `years`,`time`) VALUES ('$user_id','$fullname', '$review', '$ratings', '$name_estab', '$food', '$months', '$date', '$years', '$time')";
if ($conn->query($sql) === TRUE) {
    echo 'data inserted

 
 

    ';
}
else 
{
    echo "failed";
}
?>

