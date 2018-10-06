<?php
session_start();
//session_destroy(); //removes session with all values.

if (!isset($_SESSION['heads']) ) { //Do this when session doesn't exist.
    $_SESSION['heads'] = 0;
    $_SESSION['tails'] = 0; 
    $_SESSION['tossHistory'] = array();
}

if(rand(0,1) == 0){
    $_SESSION['heads']++;
    $_SESSION['tossHistory'][] = "H "; //adds element to array
}
else {
    $_SESSION['tails']++;
    $_SESSION['tossHistory'][] = "T "; //adds element to array
    
}

print_r($_SESSION['tossHistory']);


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Coin Flipping </title>
    </head>
    <body>
        
        <h2> Heads: <?= $_SESSION['heads'] ?></h2>
        
        <h2> Tails: <?= $_SESSION['tails'] ?></h2>


    </body>
</html>