<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("midterm");

function q1Display(){
    global $dbConn;
    $sql = "SELECT * FROM mp_town WHERE population < 80000 and population > 50000";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //print_r($records);
    echo"<hr>";
    echo "<h2>All cities/towns that have a population between 50,000 and 80,000</h2>";
    echo "<table style='width:30%', align='center'>";
        echo "<tr>";
        echo "<th>Town Name</th>";
        echo "<th>Population</th>";
        echo "</tr>";    
    foreach ($records as $record) {
        //echo $record['town_name']."    ". $record['population'];
        //echo '<br>';
        echo "<tr>";
            echo "<td>".$record['town_name']."</td>";
            echo "<td>".$record['population']."</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}

function q2Display(){
    global $dbConn;
    $sql = "SELECT * FROM mp_town  ORDER by population DESC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //print_r($records);
    echo"<hr>";
    echo "<h2>All towns and population, ordered by population (from biggest to smallest)</h2>";
        
    echo "<table style='width:30%', align='center'>";
        echo "<tr>";
        echo "<th>Town Name</th>";
        echo "<th>Population</th>";
        echo "</tr>";
    foreach ($records as $record) {
        //echo $record['town_name']."    ". $record['population'];
        //echo '<br>';
        echo "<tr>";
            echo "<td>".$record['town_name']."</td>";
            echo "<td>".$record['population']."</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}

function q3Display(){
    global $dbConn;
    $sql = "SELECT * FROM mp_town  ORDER by population ASC LIMIT 3";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //print_r($records);
    echo"<hr>";
    echo "<h2>Three least populated towns</h2>";
    
        echo "<table style='width:30%', align='center'>";
        echo "<tr>";
        echo "<th>Town Name</th>";
        echo "<th>Population</th>";
        echo "</tr>";
    foreach ($records as $record) {
        //echo $record['town_name']."    ". $record['population'];
        //echo '<br>';
        echo "<tr>";
            echo "<td>".$record['town_name']."</td>";
            echo "<td>".$record['population']."</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}

//counties that start with S.
function q4Display(){
    global $dbConn;
    $sql = "SELECT * FROM mp_county  where county_name LIKE 'S%'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //print_r($records);
    echo"<hr>";
    echo "<h2>Counties that start with the letter S</h2>";
        
        echo "<table style='width:30%', align='center'>";
        echo "<tr>";
        echo "<th>County Name</th>";
        echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
            echo "<td>".$record['county_name']."</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}
?>