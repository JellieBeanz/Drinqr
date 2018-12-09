<?php
  require "header.php";
?>
    </header>
	<main>
      <div class="wrapper-main">
        <section class="section-default">
          <h1>Signup</h1>
          <?php
          if (isset($_GET["error"])) {							//checks if error using get method
            if ($_GET["error"] == "emptyfields") {				//checks if error using get method = emptyfields
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if ($_GET["error"] == "invaliduidmail") {		//checks if error using get method = invaliduidmail
              echo '<p class="signuperror">Invalid username and e-mail!</p>';
            }
            else if ($_GET["error"] == "invaliduid") {			//checks if error using get method = invaliduid
              echo '<p class="signuperror">Invalid username!</p>';
            }
            else if ($_GET["error"] == "invalidmail") {			//checks if error using get method = invalidmail
              echo '<p class="signuperror">Invalid e-mail!</p>';
            }
            else if ($_GET["error"] == "passwordcheck") {		//checks if error using get method = passwordcheck
              echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            else if ($_GET["error"] == "usertaken") {			//checks if error using get method = usertaken
              echo '<p class="signuperror">Username is already taken!</p>';
            }
          }
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">Signup successful!</p>';
            }
          }
          ?>
		  
          <form class="form-signup" action="includes/signup.inc.php" method="post"> <!-- signup form using post method -->
          <?php

            if (!empty($_GET["uid"])) {	//checks if 
              echo '<input type="text" name="uid" placeholder="Username" value="'.$_GET["uid"].'">'; 
            }
            else {
              echo '<input type="text" name="uid" placeholder="Username">';
            }

     
            if (!empty($_GET["mail"])) {
              echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
            }
            else {
              echo '<input type="text" name="mail" placeholder="E-mail">';
            }
            ?>
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <button type="submit" name="signup-submit">Signup</button>
          </form>

        </section>
      </div>
    </main>

<?php
  require "footer.php";
?>
