<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("final_project");
include 'inc/functions.php';

if (isset($_GET['productId'])) {
  $productInfo = getProductInfo($_GET['productId']);    
  //print_r($productInfo);
}

// function getProductInfo($productID) {
//     global $dbConn;
//     $sql = "SELECT * FROM item WHERE ID = $productID";
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute();
//     $record = $stmt->fetch(PDO::FETCH_ASSOC);
//     return $record;
    
// }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <style> 
        img {
            width: 20%;
        }
    </style>
    <body>
    <center>
     <h3><?=$productInfo['name']?></h3>
     <b>Description:</b> <?=$productInfo['des']?>
     </br>
     </br>
     <img src='<?=$productInfo['image']?>'/>
     </center>
    </body>
</html>