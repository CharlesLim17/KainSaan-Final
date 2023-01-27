<?php

 
include "database.php";
 

$ratings2=$_POST['ratings2'];
$ratings3=$_POST['ratings3'];
 

$sql = "UPDATE establishment SET ratings='$ratings2'  WHERE name='$ratings3'";
if ($conn->query($sql) === TRUE) {
    echo 'data inserted

 
 

    ';
}
else 
{
    echo "failed";
}
 