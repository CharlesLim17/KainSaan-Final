<?php

session_start();
 define( 'DOIFD_SERVICE', '');

define("Server","localhost");
	define("User","root");
	define("Password","");
	define("Database","kainsaan");
	function iud($query)
	{
		$cid=mysqli_connect(Server,User,Password,Database) or die("connection error");
	$result=mysqli_query($cid,$query);
	$n=mysqli_affected_rows($cid);
	mysqli_close($cid);
	return $n;
	}
	
function select($query)
{
	$cid=mysqli_connect(Server,User,Password,Database) or die("connection error");
	$result=mysqli_query($cid,$query);
	mysqli_close($cid);
	return $result;
}

 

?>
	