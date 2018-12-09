<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("c9");

    //$sql = "SELECT * FROM p11_data WHERE 1";
    $sql = "SELECT AVG(rating) FROM p11_data WHERE 1";

    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    echo json_encode($record);
?>