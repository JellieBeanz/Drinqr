<?php
	$_SESSION['username'] = "Admin";
?>




<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
	<title>Drinqr</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="includes/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	<header>
		<a href="index.php" class="header-brand">Drinqr</a>

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-logo" href="#"><img src="#"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="gallery.php">Gallery</a></li>
			<!--		<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
			 -->
					</ul>
				</div>
			</div>
		</nav>

	</header>
	<main>
		<section class="gallery-links">
			<div class="wrapper">
				<h2>Drinq!</h2>

				<div class="gallery-container">
					<?php
						
						include_once 'includes/dbh.inc.php';
						
						$sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";	//set sql statement to variable
						$stmt = mysqli_stmt_init($conn);							//initialise prepared statement with database conenction found in dbh.inc.php
						if(!mysqli_stmt_prepare($stmt, $sql)){						//checks for error preparing statement
							echo "SQL statement failed";
						}else {
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);
							
							while ($row = mysqli_fetch_assoc($result)){
								echo '<a href="#">
								<div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
								<h3>'.$row["barTitleGallery"].'</h3>
								<h3>'.$row["titleGallery"].'</h3>
								<p>'.$row["drinkCost"].'</p>
								</a>';
							}
						}
						
						
						

					?>
				</div>

					<?php
					
					if (isset($_SESSION['username'])){ //verifies user logged in before displaying upload frame
							echo '<div class ="gallery-upload">
									<h2>UPLOAD</h2>
										<form action ="includes/gallery-uploads.php" method ="post" enctype="multipart/form-data">
											<input type ="text" name="filename" placeholder="File name...">
											<input type ="text" name="filetitle" placeholder="Image title...">
											<input type ="text" name="bartitle" placeholder="Bar name...">
											<input type ="text" name="cost" placeholder="Drink price...">
											<input type ="file" name="file">
											<button type="submit" name="submit">Upload</button>
										</form>
									</div>';	
					}

					?>

				</div>
			</div>
		</section>
		<footer>
		<div class="container-fluid text-center">
				<div class="row">
					<div class="col-sm-4">
							<h3>Contact Us</h3>
							<br>
							<h4>Contact info</h4>
					</div>
					<div class="col-sm-4">
							<img src="#" class="icon">
					</div>
					<div class="col-sm-4">
							<h3>Connect</h3>
							<a href="#" class="fa fa-facebook"></a>
							<a href="#" class="fa fa-twitter"></a>
							<a href="#" class="fa fa-google"></a>
					</div>
				</div>
			</div>
	
	</footer>
	</main>	
	

</body>

</html>