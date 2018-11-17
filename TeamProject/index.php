<!DOCTYPE html>
<html>

<head>
		<meta charset="UTF-8">
		<title>Drinqr</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="includes/style.css">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
		<script src="includes/drinqr.js"></script>
	
</head>

<body>

	<header>
		<a href="index.html" class="header-brand">Drinqr</a>

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-logo" href="#"><img src="#"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="\index.html">Home</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						<li><a href="gallery.html">Test Gallery</a></li>
						<li><a href="swipe.html">Swipe</a></li>
						<li><a href="oldswipe.html">old swipe</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- <a href="cases.php class ="header-cases">Cases</a>
		-->
	
	</header>
	<main>

	
		<div id="container">
		<?php
						
						include_once 'includes/dbh.inc.php';
						
						$sql = "SELECT imgFullNameGallery FROM gallery";	//set sql statement to variable
						$stmt = mysqli_stmt_init($conn);							//initialise prepared statement with database conenction found in dbh.inc.php
						if(!mysqli_stmt_prepare($stmt, $sql)){						//checks for error preparing statement
							echo "SQL statement failed";
						}else {
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);
							
							while ($row = mysqli_fetch_assoc($result)){
								echo '<div class="avatar buddy"  style="display: block; background-image: url(img/gallery/'.$row["imgFullNameGallery"].')"></div>';
							}
						}
		?>
		</div>
			<div class="container text-center">
									<a href="#theCarousel" data-slide="prev">
										<button type="button" class="btn btn-danger btn-circle btn-xl"><i class="glyphicon glyphicon-remove"></i></button></a>
									<a href="#theCarousel" data-slide="next">
										<button tyep="button" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-ok"></i></button> </a>
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