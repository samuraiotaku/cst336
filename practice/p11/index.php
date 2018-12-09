<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

function getAvgRating(){
    global $dbConn;
    
    $sql = "SELECT AVG(rating) FROM p11_data WHERE 1";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    return $records;
}

function getTotalRating(){
    global $dbConn;
    
    $sql = "SELECT rating FROM p11_data WHERE 1";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    return $records;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Rate this Video </title>
        

        
    </head>
    <body>
        
        <script>
            var rating =$("#rate").val();
            $('#radios input').change(function(){$('#radios').prop('disabled', true);
});
        </script>
        
        
        <h1>Rate this Video</h1>
        
        <iframe width="560" height="315" src="https://www.youtube.com/embed/CxCFtSjtSKc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        <br>Stars: 
        <br>
        <div id = radios>
                <input type="radio" id="rate" name="rate" value=1> One
                <input type="radio" id="rate" name="rate" value=2> Two
                <input type="radio" id="rate" name="rate" value=3> Three
                <input type="radio" id="rate" name="rate" value=4> Four    
        </div>
        <br><br>
        
        <div>Total Ratings: </div><br>
        <div>Average Ratings: </div>
        
        
        
        
    </body>
</html>