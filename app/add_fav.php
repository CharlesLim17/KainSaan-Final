<?php

 
include "database.php";
 

$user_id=$_POST['user_id'];
$estab_id=$_POST['estab_id'];
$estab_name=$_POST['estab_name'];
$image=$_POST['image'];
$ratings=$_POST['ratings'];
$address=$_POST['address'];
 
 

$sql="INSERT INTO `my_favorites` (`user_id`, `estab_id`, `estab_name`, `image`, `ratings`, `address`) VALUES ('$user_id', '$estab_id', '$estab_name', '$image', '$ratings', '$address')";
if ($conn->query($sql) === TRUE) {
    echo 'data inserted

 
 

    ';
}
else 
{
    echo "failed";
}
?>

 