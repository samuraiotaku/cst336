<?php
//global variables
$month = $_GET["Months"];
$locNum = $_GET["numLocations"];
$country = $_GET["Country"];
$order = $_GET["order"];
$usaPlaces = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
$francePlaces = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
$mexicoPlaces = array("acapulco", "cabos", "cancun", "chichenitza", "hautulco", "mexico_city");

    //display header info
    function displayHeader(){
        global $month,$locNum,$country;

        echo "<h1>$month Itinerary</h1>";
        echo "<h2>Visiting $locNum places in $country</h2>";
    }

    //creates the table
    function createTable() {
        global $month;
        $daysStart = 1;
        $daysEnd = 0;
        echo "<table align='center' style='width:50%'>";
        
        //sets days of month
        if($month == "November"){
            $daysEnd = 30;
        }
        if($month == "December" || "January"){
            $daysEnd = 31;
        }
        if($month == "February"){
            $daysEnd = 28;
        }
        
        for ($i = 0; $i < 5 && $daysStart <= $daysEnd; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 7; $j++) {
                echo "<td>";
                //place image
                //$index = 5 * $i + $j;
                //echo "<img src='cards/$deck[$index]'>";
                if($daysStart <= $daysEnd){
                    echo"$daysStart";
                    $daysStart++;
                }
                echo "</td>";
            }
            echo "</tr>";
        }
    }
    
    //makes sure all fields are filled before running.
    function errorCheck() {
        global $month, $locNum, $country, $order;
        
        if ($month==null || $locNum==null || $country == null || $order == null) {
            echo "<h1> <font color='red'> You must specify the number of locations! </font></h1>";
        }
        else {
            displayHeader();
            createTable();
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Winter Vacation Planner</title>
        <style>
            body{
                text-align: center
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 15px;
            }
        </style>
    </head>
    
    <body>
        <!--creates header-->
        <h1>Winter Vacation Planner !</h1>

    <div id='form'>
        <!--creates form-->
        <form method "GET">
            Select Month:
            <select name="Months">
                <option value="November">November</option>
                <option value="December">December</option>
                <option value="January">January</option>
                <option value="February">February</option>
            </select><br>
            Number of Locations:
                <input type="radio" name="numLocations" value= 3 > Three
                <input type="radio" name="numLocations" value= 4 > Four
                <input type="radio" name="numLocations" value= 5 > Five<br>
            Select Country: 
            <select name="Country">
                <option value="USA">USA</option>
                <option value="Mexico">Mexico</option>
                <option value="France">France</option>
            Visit locations in alphabetical order: 
                <input type="radio" name="order" value= "A-Z" > A-Z
                <input type="radio" name="order" value= "Z-A" > Z-A <br>
                <input type="submit" value="Create Itinerary" >
            </select>
        </form>        
    </div>
        
    <hr>
        
    <div id='display'>
        <?php 
            //displayHeader();
            //createTable();
            errorCheck();
        ?>
    </div>

    </body>
</html>