<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "innerchef";
$con=new mysqli($host,$user,$password,$database);
	if($con->connect_error)
	{
		die("Connection failed");

	}

	
?>

