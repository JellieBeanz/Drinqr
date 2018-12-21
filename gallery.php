<?php

	require "header.php";
?>

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
		</main>	
<?php
  require "footer.php";
?>