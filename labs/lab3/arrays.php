<?php

    function displayArray($my_symbols) {
        echo '<hr>';
        print_r($my_symbols);
    }

    $symbols = array("seven");
    print_r($symbols);
    
    array_push($symbols,"orange", "grapes");
    print_r($symbols);
    
    
    $points = array("orange"=> 250, "cherry"=> 500);
    echo $points[0];
    $points["seven"] = 1000; //adds to endf of array

    $symbols[] = "cherry"; //adds element to end of array.
    print_r($symbols);
    
    $symbols[2] = "lemon"; //replaces element in index 2.
    print_r($symbols);
    
    displayArray($symbols);
    sort($symbols);
    displayArray($symbols);
    
    unset($symbols[2]); // remove element in array
    displayArray($symbols);
    
    $symbols = array_values($symbols); //re-indexes elements in array.
    displayArray($symbols);
    
    shuffle($symbols);
    displayArray($symbols);
    
    echo "Random item: " . $symbols[ rand(0, count($symbols) - 1)]; //displays random item
    echo "Random item: " . $symbols[ array_rand($symbols)]; //displays random item
    echo "<img src' =../lab2/img/" . $symbols[ array_rand($symbols) ] . ".png'>";
    
    
    $indexes = array();
    
    for( $i = 0 ; $i < 3 ; $i++ ) {
        //print_r($symbols[$i]);
        //print_r(", ");
        echo "<img src ='img/$symbols[$i].png' alt='$symbols[$i]' title='".ucfirst($symbols[$i])."'/>";
    }
    
    // for($i = 0; $i < 3; $i++) {
        
    //     $indexes[] = $symbols[ array_rand($symbols) ];
         echo "<img src='../lab2/img/" . $symbols[ array_rand($i) ] . ".png'>";
    // }
    
    echo "<hr>";
    print_r($indexes);
    
    if ($indexes[0] == $indexes[1] && $indexes[1] == $indexes[2]) {
        
        echo "Congrats!! you won ";

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>