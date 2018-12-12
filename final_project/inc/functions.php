<?php


function displayCategories() { 
        global $dbConn;
        
        $sql = "SELECT * FROM category ORDER BY catName";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value='".$record['catID']."'>" . $record['catName'] . "</option>";
        }
    }


function filterProducts() {
        global $dbConn;
        // global $items;
        
        $namedParameters = array();
        $product = $_GET['productName'];

      
        $sql = "SELECT * FROM item WHERE 1"; //Gettting all records from database
        
        if (!empty($product)){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND name LIKE :product OR des LIKE :product";
             $namedParameters[':product'] = "%$product%";
        }
        
        if (!empty($_GET['category'])){
            //This SQL prevents SQL INJECTION by using a named parameter
             $sql .=  " AND catID =  :category";
              $namedParameters[':category'] = $_GET['category'] ;
        }
        
        if(!empty($_GET['priceFrom'])) {
            $sql .= " AND price >= :priceFrom";
            $namedParameters["priceFrom"] = $_GET['priceFrom'];
        }
        
        if(!empty($_GET['priceTo'])) {
            $sql .= " AND price <= :priceTo";
            $namedParameters["priceTo"] = $_GET['priceTo'];
        }
        
        //echo $sql;
        
        if (isset($_GET['orderBy'])) {
            
            if ($_GET['orderBy'] == "productPrice") {
                
                $sql .= " ORDER BY price";
            } else {
                
                  $sql .= " ORDER BY name";
            }
        }
        if (isset($_GET['order'])) {
             if ($_GET['order'] == "productPrice") {
                
                $sql .= " ORDER BY price DESC";
            }
        }
    
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        
        if(isset($records)) {  
            echo "<table class='table'>";
            foreach ($records as $record) {
                $productID = $record['ID'];
                $productName = $record['name'];
                $productPrice = $record['price'];
                $productImage = $record['image'];
                $productDes = $record['des'];
            
                echo '<tr>';
                // echo "<a href='productInfo.php?productID=".$record['productID']."'>";
                //echo $record['productID'];
                echo "<td><img height='100' width='100' src='" . $productImage . " '></td>";
                echo "<td><h4>" . $productName . "</h4></td>";
                echo "<td><h4>" . $productDes . "</h4></td>";
                echo "<td><h4>" . " " . $productPrice . " P-Dollars" . "</h4></td>";
               
                // Hidden input element
                echo "<form method='post'>";
                echo "<input type='hidden' name='productName' value='$productName'>";
                echo "<input type='hidden' name='productPrice' value='$productPrice'>";
                echo "<input type='hidden' name='productImage' value='$productImage'>";
                echo "<input type='hidden' name='productID' value='$productID'>";
                echo "<input type='hidden' name='productDes' value='$productDes'>";
                
                
                echo '</tr>';
                echo '</form>';
                
            }
            echo "</table>";
        }
    }

function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM item ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    echo "<table border='1' style='width:30%', align='center'>";
    echo "<tr>";
    echo "<th>Item Name</th>";
    echo "<th>Price</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
        echo "[<td><a
        onclick='openModal()' target='productModal'
        href='productInfo.php?productId=".$record['ID']."'>".$record['name']."</a></td>]  ";
        echo "<td> $" . $record[price]   . "</td>";
        echo "<td><a class='btn btn-primary' role='button' href='updateProduct.php?productId=".$record['ID']."'>Update</a></td>";
        echo "<td><form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
        echo "<input type='hidden' name='productId' value='".$record['ID']."'>";
        echo "<button class='btn btn-outline-danger' type='submit'>Delete</button></td>";
        echo "</form></td>";
    }
    echo "</table><br>";
}

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}

function getProductInfo($productId) {
     global $dbConn;
    
    $sql = "SELECT * FROM item WHERE ID = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
}

function displayAVG(){
    global $dbConn;
    $sql = "SELECT AVG(price) AS average FROM item WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($records);
    $average = $record['average'];
    echo $average;
}

?>