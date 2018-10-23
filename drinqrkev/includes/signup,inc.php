<?php
	include_once 'includes/dbh.inc.php';

	$sql = "INSERT into users (user_first, user_last, user_email, user_uid, user_pwd)
			VALUES ('Yosen','Ryan','Yoeydough@hotmail.com','yoyojoe12','secondpwd');";
	mysqli_query($conn, $sql);

	header("Location: ../index.php?signup=success");
	
?>