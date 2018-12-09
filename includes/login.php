<?php
if (isset($_POST['login-submit'])) { // checks if user gained access to this page by selecting the "login-submit" button
	
	require 'dbh.inc.php';				//includes database connection file
	
	$mailuid = $_POST ['mailuid'];		// sets form field 'mailuid' to the mailuid variable
	$password = $_POST ['pwd'];			// sets the 'pwd' form field to the password variable
	
	
	if (empty($mailuid) || empty($password)){				// checks for empty fields in login form
		header("Location: ../index.php?error=emptyfields"); 	//sends user back to login page with error code "emptyfields" in url
		exit();													//exit all code from here on
	}else{
		$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";			//creates variable sql to hold prepared statement using ? as placeholder - searches database in users table for either username or email address
		$stmt = mysqli_stmt_init($conn);										// initialise sql connection (from dbh.inc.php file)
		if (!mysqli_stmt_prepare($stmt, $sql)){									// prepares statement and checks for error
			header("Location: ../index.php?error=sqlerror"); 
			exit();													//exit all code from here on

		}else{
			
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);		//replaces previous prepared statement placeholder "?"'s with 2 strings "s" with username variable $mailuid - Searches both username and email fields in database for username variable
			mysqli_stmt_execute($stmt);										//Executes sql statement (now bound with parameters)
			$result = mysqli_stmt_get_result($stmt); 						//gets result of statement and adds to variable result
		
			if ($row = mysqli_fetch_assoc($result)){						// adds result into associciative array and sets to variable "row" - if statement checks if there is a result from the statement (not zero)
				$pwdCheck = password_verify($password, $row['pwdUsers']);	//creates variable pwdCheck and sets it to password_verify method. parameters are password from login form and password from database
				if(pwdCheck == false){										//checks if password provided and password in database match
					header("Location: ../index.php?error=wrongpassword"); 	// if password do not match, send user to index with wrongpassword error
					exit();	
				}else if(pwdCheck == true){									// if password match proceed to login
					session_start();										//start session
					$_SESSION['userId'] = $row['idUsers'];					//stores id of user in session
					$_SESSION['userUid'] = $row['uidUsers'];				//stores username of user in session
					
					header("Location: ../index.php?login=success"); 		//returns user to index with success message
					exit();	
					
				}

			}else {
				header("Location: ../index.php?error=nouser"); 				// if no result from statment = no username or email in database. Returns to index with nouser error
				exit();	
			}
		}
	}
	
	
}else {
	header("Location: ../index.php");			// if user did not gain access by selecting "login-submit" button returns to index
    exit();	
}