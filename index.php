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
	<script src="includes/drinqr.js"></script>
	
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
					
					<a href="index.php"><img class="navbar-logo" src="/img/logo.png"></a>
				</div
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="gallery.php">Gallery</a></li>
			<!--		<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
			 -->
					</ul>
				</div>
			</div>
		</nav>
		<!--
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-logo" href="#"><img src="#"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="gallery.php">Gallery</a></li>
					</ul>
				</div>
			</div>
		</nav>
		 <a href="cases.php class ="header-cases">Cases</a>
		-->
	
	</header>
	<main>

	
		<div id="container">
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
								echo '

								<div class="buddy" style="display: block;"><div class="avatar" style="display: block; background-image: url(img/gallery/'.$row["imgFullNameGallery"].')">
								<h3>'.$row["barTitleGallery"].'</h3>
								
								<p>'.$row["drinkCost"].'</p></div></div>
								';
							}
						}
		?>
		</div>
			<div class="container text-center">
									<a href="#theCarousel" data-slide="prev">
										<button type="button" class="btn btn-danger btn-circle btn-xl"><i class="glyphicon glyphicon-remove"></i></button></a>
									<a href="#theCarousel" data-slide="next">
										<button type="button" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-ok"></i></button> </a>
			</div>
		</div>
	</main>
	
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
		
	</body>


</html>