<?php
	$_SESSION['username'] = "Admin";
	require "header.php";
?>

		<a href="index.php" class="header-brand">Drinqr</a>

		<nav>
        <ul>
			<li><a href="about.html">About</a></li>
			<li><a href="contact.html">Contact</a></li>
			</ul>
			<a href="gallery.php" class="header-cases">Drinq DB</a>
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
		</section>
		<div class="wrapper">
		<footer>
        <ul class="footer-links-main">
          <li><a href="index.php">Home</a></li>
          <li><a href="gallery.php">Drinq Database</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        
        <div class="footer-sm">
          <a href="https://www.youtube.com/watch?v=hHW1oY26kxQ">
            <img src="img/youtube-symbol.png" alt="youtube icon">
          </a>
          <a href="https://twitter.com/NCIRL">
            <img src="img/twitter-logo-button.png" alt="twitter icon">
          </a>
          <a href="https://www.facebook.com/NCILIBRARY/">
            <img src="img/facebook-logo-button.png" alt="facebook icon">
          </a>
        </div>

      </footer>
	  </div>
	</main>	
	

</body>

</html>