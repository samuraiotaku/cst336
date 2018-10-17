<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");



function displayCategories(){
    global $dbConn;
    $sql = "SELECT * FROM om_category";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //print_r($records);
    echo"<hr>";
    //echo $records[2] . "<br>"; 
    //echo $records[1]['catDescription'] . "<br>"; 

    foreach ($records as $record) {
        echo "<option value= '".$record['catId']."'>" . $record['catName'] . "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    $nameParameters = array();
    $product = $_GET['productName'];
    
    //works but doesn't prevent SQP injection. (due to single quotes)
    //$sql = "SELECT * FROM om_product 
    // WHERE productName LIKE '%$product%' OR productDescription LIKE '%$product%';";
            
    $sql = "SELECT * FROM om_product WHERE 1"; //get all the records.

    if(!empty($product)) {
        
        $sql .= " AND productName LIKE :product";
        $nameParameters[':product'] = "%$product%";
    }
    
    if(!empty($_GET['category'])) {
        
        $sql .= " AND catId LIKE :category";
        $nameParameters[':category'] = $_GET['category'] ;
    }



    //echo $sql;
    
    if(isset($_GET['orderBy'])) {
        if($_GET['orderBy'] == "productPrice"){
            $sql .= " ORDER BY price";
        }
        else {
            $sql .= " ORDER BY productName";
        }
    }
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($nameParameters);
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    print_r($records);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: OtterMart Product Search</title>
        <style>
            body{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>OtterMart</h1>
        <h2>Product Search</h2>
        
        <form>
            
            Product: <input type="text" name="productName" placeholder="Product keyword" /> <br />
            
            Category: 
            <select name="category">
               <option value=""> Select one </option>  
               <?=displayCategories()?>
            </select><br>
            
            Price From: <input type="text" name="priceFrom" size="10"/>
            To: <input type="text" name="PriceTo" size="10"/><br>
            
            Order Results By: <br>
            <input type="radio" name="orderBy" value="price"> Price<br>
            <input type="radio" name="orderBy" value="name"> Name<br><br>
            
            
            <input type="submit" name="submit" value="Search!"/>
        </form>
        
        <?=filterProducts()?>
    </body>
</html>