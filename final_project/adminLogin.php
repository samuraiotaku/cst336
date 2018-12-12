<?php



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        
        <title>PokeMart Online</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>

        <?php 
	        include 'inc/header.php';
	    ?>
	    
	    <div id=loginMain>
	        <br><h1>Admin Login</h1><br>
	        
            <form method="post" action="loginProcess.php">
                Username:  <input type="text" name="username"/> <br><br>
                Password:  <input type="password" name="password"/> <br><br>
                <input type="submit" value="Login"><br>
            </form>
	        <br>
	    </div>
        


    </body>
    <footer>
        <?php
	        include 'inc/footer.php';
        ?>
    </footer>
</html>