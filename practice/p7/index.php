<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

function displayCategories(){
    global $dbConn;
    $sql = "SELECT DISTINCT (category) FROM p1_quotes";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    echo"<hr><br<";
    foreach ($records as $record) {
        echo "<option value= '".$record['category']."'>" . $record['category'] . "</option>";
    }
}

function filterQuote() {
    global $dbConn;
    $nameParameters = array();
    $keyword = $_GET['keyword'];
    
    $sql = "SELECT * FROM p1_quotes WHERE 1"; //get all the records.

    if(!empty($keyword)) {
        
        $sql .= " AND quote LIKE :quote";
        $nameParameters[':quote'] = "%$keyword%";
    }
    
    if(!empty($_GET['category'])) {
        
        $sql .= " AND category LIKE :category";
        $nameParameters[':category'] = $_GET['category'] ;
    }

    if(isset($_GET['orderBy'])) {
        if($_GET['orderBy'] == "A-Z"){
            $sql .= " ORDER BY quote ASC";
        }
        else {
            $sql .= " ORDER BY quote DESC";
        }
    }
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($nameParameters);
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //print_r($records);
    
    // foreach ($records as $record) {
    //         echo $record['author'] . " : " . $record['quote'] . " : " . $record['category'] . "<br>" . "<br>";
    // }
    
    
    echo "<table style='width:90%', align='center'>";
        echo "<tr>";
        echo "<th>Author</th>";
        echo "<th>Category</th>";
        echo "<th>Quote</th>";
        echo "</tr>";    
    foreach ($records as $record) {
        echo "<tr>";
            echo "<td>".$record['author']."</td>";
            echo "<td>".$record['category']."</td>";
            echo "<td>".$record['quote']."</td>";
        echo "</tr>";
    }
    echo "</table><br>";    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Quote Finder </title>
        <style>
            @import url("css/styles.css");
            table, th, td {
               border: 1px solid black;
            }
        </style>
    </head>
    <body>

        
        <div id='banner'>
            <h1>Famous Quote Finder</h1>
            <br>        
        </div>

        
        <div id='form'>
            <br><br>
            <form>
                Enter Quote Keyword: 
                <input type="text" name="keyword"><br><br>
                <select name="category">
                   <option value=""> Select one </option>  
                   <?=displayCategories()?>
                </select><br><br>
                <input type="submit" value="Display Quotes!"><br><br>
                <hr>
            </form>            
                <?=filterQuote()?>
        </div>
        
    </body>
</html>