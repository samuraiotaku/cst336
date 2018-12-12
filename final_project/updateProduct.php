<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("final_project");
include 'inc/functions.php';
//validateSession();

if (isset($_GET['updateProduct'])){  //user has submitted update form
    
    $np = array();
    $np[':ID'] = $_GET['ID'];
    $np[':name'] = $_GET['name'];
    $np[':price'] = $_GET['price'];
    $np[':image'] = $_GET['image'];
    $np[':catID'] = $_GET['catID'];
    $np[':des'] = $_GET['des'];
    
    // $name = $_GET['name'];
    // $des = $_GET['des'];
    // $price =  $_GET['price'];
    // $catID =  $_GET['catID'];
    // $image = $_GET['image'];

    
    
    $sql = "UPDATE item 
            SET 
                name = :name,
                price = :price,
                image = :image,
                catID = :catID,
                des = :des               
            WHERE ID = " . $_GET['productId'];
    //print_r($np);
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);       
    
}


if (isset($_GET['productId'])) {
  $productInfo = getProductInfo($_GET['productId']);    
 print_r($productInfo);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <header>
        <?php 
	        include 'inc/header.php';
	    ?>
    </header>
    <body>
        
        <div id="updateProductMain">
            
        <br><h1> Updating a Product </h1>
        
        <form><br>
            Product ID: <input type="text" name="ID" value="<?=$productInfo['ID']?>">
            <br><br>Product name: <input type="text" name="name" value="<?=$productInfo['name']?>"><br><br>
            Description: <br><textarea name="des" cols="50" rows="4"> <?=$productInfo['des']?> </textarea><br><br>
            Price: <input type="text" name="price" value="<?=$productInfo['price']?>"><br><br>
            Category: 
            <select name="catID">
                <option value="">Select One</option>
                <?php
                $categories = displayCategories();
                foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catID']==$productInfo['catID'])?"selected":"";
                  echo " value='".$category['catID']."'</option>";
                }
                ?>
           </select> <br><br>
           
           Set Image Url: <input type="text" name="image" value="<?=$productInfo['image']?>"><br><br>
           
           <input type="submit" name="updateProduct" value="Update Product">
           
        </form><br>
            
        </div>
        
    </body>
    <footer>
        <?php 
	        include 'inc/footer.php';
	    ?>
    </footer>
</html>