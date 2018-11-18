<?php
//upload form 
if (isset($_POST['submit'])){  			//verifies that 'submit' button was selected from upload form
	
	$newFileName = $_POST['filename']; 	//set variable newFileName to equal form entry 'filename'
	if (empty($newFileName)){ 			//checks if no value entered for 'filename' field and if so sets to default "gallery"
		$newFileName ="gallery";
	}else {
		$newFileName = strtolower(str_replace(" ", "-", $newFileName)); 	//converts form entry for 'filename' field into lower case, then replaces all spaces " " with dashes "-" 
	}
	$imageTitle = $_POST['filetitle']; 	//* 
	$barTitle = $_POST['bartitle'];		//* 
	$drinkCost = $_POST['cost'];		//* - saves form entry data into variables
	
	$file = $_FILES['file'];			// - saves uploaded file into variable (array)
	
	
	$fileName = $file["name"];			//*
	$fileType = $file["type"];			//*
	$fileTempName = $file["tmp_name"];	//*
	$fileError= $file["error"];			//*
	$fileSize = $file["size"];			//* - saves uploaded file information into seperate variables (from array)
	
	
	$fileExt = explode(".", $fileName);			//to get the file extenstion - explode method seperates string before and after the "." into an array
	$fileActualExt = strtolower(end($fileExt)); //coverts array containing file name and file extension into lower case using strtolower method, then selects the final array value using end() method and sets to fileActualExt
	
	$allowed = array("jpg", "jpeg", "png");		//sets what file extension should be allowed to be uploaded
	
	if (in_array($fileActualExt, $allowed)){	//in_array method checks if the fileActualExt is contained inside the allowed extension array
		if ($fileError === 0){ 					//checks if error message when uploading file exists
			if($fileSize < 2000000){				//checks if file size is less than 20 mb (20000 kb)	
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;  // generates unique name for file to make filename unique. uses uniqid method and concats file extension including periods "."
				$fileDestination = "../img/gallery/" . $imageFullName;				// sets destination into gallery folder with new full unique file name
				
				include_once "dbh.inc.php";												// include database connection file
				
				 if (empty($imageTitle) || empty($barTitle) || empty($drinkCost)){		//checks for empty form entries
					 header("Location: ../gallery.php?upload=empty");					//redirects to error message page
					 exit();
				 }else {
					 $sql = "SELECT * FROM gallery;";									//set sql query as variable sql
					 $stmt = mysqli_stmt_init($conn);									//initialise prepared statement with database conenction found in dbh.inc.php
					 if (!mysqli_stmt_prepare($stmt, $sql)){							//check if perpared statement failed
						 echo "SQL statement failed";
					 }else{
						mysqli_stmt_execute($stmt);			
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;									//save number of entries in database (used for image order/sort)
						
						$sql = "INSERT INTO gallery (titleGallery, barTitleGallery, drinkCost, imgFullNameGallery, orderGallery) 
								VALUES (?, ?, ?, ?, ?);"; 								// insert data into database - placeholders for prepared statements with "?"
						if (!mysqli_stmt_prepare($stmt, $sql)){							//check if perpared statement failed
							echo "SQL statement failed";
						}else {
							mysqli_stmt_bind_param($stmt, "sssss", $imageTitle, $barTitle, $drinkCost, $imageFullName, $setImageOrder); //replaces "?" placeholders with values
							mysqli_stmt_execute($stmt);																					//execute prepared statement
							
							move_uploaded_file($fileTempName, $fileDestination);							//upload file onto server (gallery folder)
							
							
							header("Location: ../gallery.php?upload=success");								//display upload success message
						}
						
						
					 }
					 
				 }
				
				
			}else{
				echo "File size too big, must be less than 20mb";
			}
		}else{
			echo "You had an error!";			//outputs if error exists
			exit();
		}
	}else{
		echo "You need to upload an image file of type JPG or PNG";
		exit();
	}	
}
?>