<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Drinqr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	
  </head>

<body>

	<header> 			<!-- Header which includes the login form -->
		
		<nav class ="nav-header-main">
		<a href="index.php" class="header-brand">DRINQR</a>
		
			<ul>
				<li><a href="about.html">About</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
			</nav>
			
			<a href="gallery.php" class="header-cases">DrinqDB</a>
			
			<div class="header-login">
			<?php
				if (!isset($_SESSION['userId'])) {
					echo '<form action ="includes/login.php" method ="post">
						<input type = "text" name = "mailuid" placeholder ="Username">
						<input type = "password" name = "pwd" placeholder ="Password">
						<button type = "submit" name = "login-submit">Login</button>
					</form>
					<a href ="signup.php" class="header-signup">Signup</a>';
				}
				else if (isset($_SESSION['userId'])) {
					echo '	<form action ="includes/logout.php" method ="post">
							<button type = "submit" name = "logout-submit">Logout</button>
							</form>';			
				}
			?>
			</div>
		</nav>

