<?php
if (isset($_POST['signup-submit'])) { // checks if user gained access to this page by selecting the "signup-submit" button

 require 'dbh.inc.php';  //adds database connection file

  $username = $_POST['uid']; 				//sets username variable to form input from signup.php
  $email = $_POST['mail'];					//sets email variable to form input from signup.php
  $password = $_POST['pwd'];				//sets password variable to form input from signup.php
  $passwordRepeat = $_POST['pwd-repeat'];	//sets password repeat variable to form input from signup.php

 if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {			// error handler which checks that all form fields have some input
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);			// if there is an empty field, header sends user back to signup page with username and email field filled
    exit();																						//exit method stops all code from running after this point
  }
 else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) { //verifies if email AND username are invalid using FILTER_VALIDATE_EMAIL and preg_match search pattern function
    header("Location: ../signup.php?error=invaliduidmail");										// if there is an invalid email, header sends user back to signup page
    exit();																						//exit method stops all code from running after this point
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {										//uses preg_match function search pattern across a-z, 0-9 and username variable
    header("Location: ../signup.php?error=invaliduid&mail=".$email);							// if there is an invalid username, header sends user back to signup page with email field filled
    exit();																						//exit method stops all code from running after this point
  }
 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {											//verifies if email is invalid using FILTER_VALIDATE_EMAIL
    header("Location: ../signup.php?error=invalidmail&uid=".$username);							// if there is an invalid email, header sends user back to signup page with username field filled
    exit();																						//exit method stops all code from running after this point
  }
else if ($password !== $passwordRepeat) {														// verifies if password and repeat password match
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);		// if passwords don't match, header sends user back to signup page with username and email fields filled
    exit();																						//exit method stops all code from running after this point
  }	
  else {
																								//Checking if username already taken in database
  $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";										//creates prepared sql statement and saves to variable - selects all usernames from database where username =  placeholder "?" - placeholder to be replaced by username
  $stmt = mysqli_stmt_init($conn);																//initialises database connection refering to connection variable						
  if (!mysqli_stmt_prepare($stmt, $sql)) {														//check if sql statement failed
   header("Location: ../signup.php?error=sqlerror");											//if sql statement failed go to signup page with error message
      exit();																					//exit method stops all code from running after this point
    }
    else {																						//if no sql error
     mysqli_stmt_bind_param($stmt, "s", $username);												//bind statement saved in stmt variable, type string "s" and username - "s" replaces "?" placeholder
    mysqli_stmt_execute($stmt);																	//execute sql statement					
   mysqli_stmt_store_result($stmt);																//saves result from sql statement into stmt variable
    $resultCount = mysqli_stmt_num_rows($stmt);													//check number of rows returned in statement
     mysqli_stmt_close($stmt);																	
     if ($resultCount > 0) {																	//if the sql search returned more than one result when searching for username in database (I.E. username is taken) 
        header("Location: ../signup.php?error=usertaken&mail=".$email);							// return user to signup page with usertaken error code, filling in email field
        exit();																					//exit method stops all code from running after this point
      }
      else {																					//else if no results (I.E. username is not taken)
      $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";			//insert user information into database - values are placeholder
       $stmt = mysqli_stmt_init($conn);															//prepares connection and checks if sql statement fails as above															
       if (!mysqli_stmt_prepare($stmt, $sql)) {													//
       header("Location: ../signup.php?error=sqlerror");										//
          exit();																				//
        }
        else {																					//else if sql did not fail
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);								//creates hashed password variable and uses password_hash method under PASSWORD_DEFAULT setting

         mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);					//replaces "?" placeholders with string variables 
          mysqli_stmt_execute($stmt);															//executes statement and adds user information to database
		header("Location: ../signup.php?signup=success");										//returns user to signup page with success message
          exit();	//exit method stops all code from running after this point

        }
      }
    }
  }
 mysqli_stmt_close($stmt);																		//closes statement
  mysqli_close($conn);																			// closes db connection
}
else {
  header("Location: ../signup.php");															//sends user to signup page if user attempts to access page without clicking "signup-submit" button					
  exit();	
}
