<?php

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "drinqr";
	
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	
	if (!$conn){
		
		die("Connection failed: ".mysqli_connect_error()); //kills connection if it fails and outputs error message
	}
?>