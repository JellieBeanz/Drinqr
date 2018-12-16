<?php

	$dbServername = "shanesproj.database.windows.net";
	$dbUsername = "x15048209";
	$dbPassword = "Jwfn3262";
	$dbName = "Drinqr";
	
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	
	if (!$conn){
		
		die("Connection failed: ".mysqli_connect_error()); //kills connection if it fails and outputs error message
	}
?>