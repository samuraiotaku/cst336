<?php
$monsters = array("Chimera", "Dragon");
$weapons = array("Sword", "Axe", "Club");
$dragonCount = 0;
$chimeraCount = 0;
$swordCount = 0;
$axeCount = 0;


function displayMonsters($i) {
    global $monsters, $dragonCount, $chimeraCount;
    shuffle($monsters);
    echo "<img width='300' src='img/$monsters[$i].png'>";
    echo "<br>";
    if($monsters[$i] == "Dragon") {
        $dragonCount++;
    }
    if($monsters[$i] == "Chimera") {
        $chimeraCount++;
    }
}    

function displayWeapons($i) {
    global $weapons, $swordCount, $axeCount;
    shuffle($weapons);
    echo "<img width='150' src='img/$weapons[$i].png'>";
    if($weapons[$i] == "Sword") {
        $swordCount++;
    }    
    if($weapons[$i] == "Axe") {
        $axeCount++;
    }
}    
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <title> Homework 2 Website </title>
        
    </head>
    <body>
        <h1 id="title" style="background-color:DodgerBlue;"> Welcome to the Arena! </h1>
        <br/><br/>

        <h2 id="instruction"> Swords Beat Dragons and Axes Beat Chimera. Get enough weapons to defeat all the monsters! </h2><br/></br/>
        
        <h2 id="mApperance"> Monsters have Appeared! </h2><br/>
        <div id="monsters">
           <?php
                //Displays 2 monsters.
                global $monsters;
                
                for ($i = 0; $i < count($monsters); $i++) {
                    displayMonsters($i);
                }
           ?>
        </div>
        
        <h2 id="equipment"> Your Current Equipment! </h2>
        <div id="weapons">
            <?php
                global $weapons;
                
                //display 3 random Weapons.
                for ($i = 0; $i < count($weapons); $i++) {
                    displayWeapons($i);
                }
            ?>
        </div><br/>
        
        <div>
            <?php
                global $swordCount, $axeCount, $dragonCount, $chimeraCount;
                $exp = rand(0,100);
                
                if($swordCount >= $dragonCount && $axeCount >= $chimeraCount){
                    echo "<h2 id='result'> You have Defeated all the Monsters! 
                    <br/> You gained $exp EXP!</h2><br/><br/>";
                    
                }
                else {
                    echo "<h2 id='result'> You Could Not Defeat the Monsters. </h2><br/><br/>";
                    
                }
            ?>
        </div>

    </body>
    
    <footer>
        <!--<hr width="50%" />-->
        <p>Website designed by Brandon Shimizu</p>
        <p>9-26-2018</p>
    </footer>
</html>