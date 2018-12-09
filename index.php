<?php
	require "header.php";
?>

<body>
    <!-- start padding container -->
    <div class="wrap">
    <div id="tinderslide">
    <ul>
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
            
                                            
                    <!-- start slide from Db container -->
                    
                        
                            <li class="pane1">
                                <div class="img" style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].')"></div>
                                <div>'.$row["barTitleGallery"].'</div>
                                <div>'.$row["drinkCost"].'</div>
                                <div class="like"></div>
                                <div class="dislike"></div>
                            </li>
                          
                    
                    <!-- end jtinder container -->
                
                                            ';
                    }
                    }
                ?>
                
                </ul>
    </div>
   </div>

    <!-- jTinder trigger by buttons  -->
    <div class="actions">
        <a href="#" class="dislike"><i></i></a>
        <a href="#" class="like"><i></i></a>
    </div>
   
 <!-- jQuery lib -->
 <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- transform2d lib -->
    <script type="text/javascript" src="js/jquery.transform2d.js"></script>
    <!-- jTinder lib -->
    <script type="text/javascript" src="js/jquery.jTinder.js"></script>
    <!-- jTinder initialization script -->
    <script type="text/javascript" src="js/main.js"></script>
</body>
<?php
  require "footer.php";
?>
</html>