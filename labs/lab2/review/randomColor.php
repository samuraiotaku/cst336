<?php
    function getLuckyNumber() {
    $randomValue = rand(1,10);
    while($randomValue == 4) {
        $randomValue = rand(1,10);
        }
        echo $randomValue;        
    }
    
    function getRandomColor() {
        echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(1,10)/10).");";
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
        
        <style>
            
            body{
                <?php getRandomColor(); ?>
            }
            
            h1{
                <?php getRandomColor(); ?>
            }
            
        </style>
        
    </head>
    <body>
        
        <h1>My Lucky Number is: 
        
        <?php
            getLuckyNumber();
            getRandomColor();
        ?>
        </h1>
        
        


    </body>
</html>