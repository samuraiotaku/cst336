<?php
include 'inc/dbConnection.php';
$dbConn = startConnection("final_project");
    
$sql = "SELECT count(*) itemCount FROM item";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo json_encode($record);
?>