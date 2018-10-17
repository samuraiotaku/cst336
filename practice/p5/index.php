<?php
session_start();
$_SESSION['passHistory'];


    function check_num($pass) {
      if ($pass > 8)
        echo "I SAID, no more then 8.";
      else {
        echo "This doesn't work yet.";
      }
        
    }
    
    function pass_num() {
        //$_SESSION['password'] = 0;
        //Declare an array of character arrays (strings)
        $passwords = array();
        for ($i = 0; $i < $_GET["passwordAmount"]; $i++) {
            $container = array();
            for($j = 0; $j < $_GET["password"]; $j++) {
                $charValue = rand(65,90);
                array_push($container, chr($charValue));
            }
            array_push($passwords, $container);
        }
        $_SESSION['passHistory'] = $passwords;
    }
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>password Generator</title>
        <style>
            body {
                text-align: center
                background-color:#0df2b9;
            }
        </style>
        
    </head>
    <body>
        <h1>Custom Password Generator</h1>
        <form method "GET">
            How many passwords:
            <input type="text" name="passwordAmount" size=2>
            (No more than 8.)<br>
            <h3>password length</h3>
            <input type="radio" name="password" value=6 checked> 6 characters
            <input type="radio" name="password" value=8> 8 characters
            <input type="radio" name="password" value=10> 10 characters <br><br>
            <input type="checkbox" name="digits" value="passDigit"> include digits. (Up to 3 digits will be part of the password)<br><br>
            <input type="submit" value="Create Passwords"> <br><br>
            <input type="submit" value="Password History"> <br>
            
            <?php
                pass_num();
                //print_r($_SESSION['passHistory']);
                echo json_encode($_SESSION['passHistory']);
            ?>
        </form>
    </body>
</html>