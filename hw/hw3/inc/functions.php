<?php
//Global Variables
$name = $_GET["Name"];
$ancestry = $_GET["Ancestry"];
$gender = $_GET["Gender"];
$class = $_GET["Class"];
$description = $_GET["Description"];



//makes sure all fields are filled before running.
function createAdventurer() {
    global $name, $ancestry, $gender, $class, $description;
    
        if ($name==null || $ancestry==null || $gender == null || $class == null || $description == null) {
            echo "<h1> <font color='red'> There is missing Information! </font></h1>";
        }
        else {
            echo "<h1>Adventurer: $name </h1>";
            echo "<img src='img/$class.jpg' style='width:250px;height:250px;'><br><br>";
            echo "Class: $class<br><br>";
            echo "Race: $ancestry<br><br>";
            echo "Gender: $gender<br><br>";
            if($class == "Fighter"){
                echo "Equipment: GreatSword, Heavy Armor<br><br>";
            }
            if($class == "Wizard"){
                echo "Equipment: Staff, Robe<br><br>";
            }
            if($class == "Rogue"){
                echo "Equipment: Knife, Leather Armor<br><br>";
            }
            if($class == "Cleric"){
                echo "Equipment: CrossBow, Chainmail<br><br>";
            }
            echo "Notes: $description";
        }
}
?>