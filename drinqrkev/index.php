<?php
	include_once 'includes/dbh.inc.php';
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title> Title</Title>

<!-- 
<link ref = "stylesheet" type = "text/css" href = "style.css">
 -->
</head>

<body>

<form>
	<input type = "text" name = "first" placeholder = "Firstname"> <br>
	<input type = "text" name = "last" placeholder = "Lastname"> <br>
	<input type = "text" name = "email" placeholder = "E-mail"> <br>
	<input type = "text" name = "uid" placeholder = "Username"> <br>
	<input type = "password" name = "pwd" placeholder = "Password"> <br>
	<button type ="submit" name ="submit"> Sign up!</button>
</form>

<?php
	$sql = "INSERT into users (user_first, user_last, user_email, user_uid, user_pwd)
			VALUES ('Yosen','Ryan','Yoeydough@hotmail.com','yoyojoe12','secondpwd');";
	mysqli_query($conn, $sql);

?>

</body>
</html>