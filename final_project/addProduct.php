<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("final_project");
include 'inc/functions.php';

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    
    $sql = "INSERT INTO item (name, des, image, price, catID) 
            VALUES (:productName, :productDescription, :productImage, :price, :catId);";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Product was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <?php 
	        include 'inc/header.php';
	    ?>
	    
	    <div id="addProductMain">
	        <br><h1> Adding New Product </h1><br>
            <form>
               Product name: <input type="text" name="productName"><br><br>
               Description: <br><textarea name="description" cols="50" rows="4"></textarea><br><br>
               Price: <input type="text" name="price"><br><br>
               Category: 
               <select name="catId">
                  <option value="">Select One</option>
                  <?php
                  
                  $categories = displayCategories();
                  
                  foreach ($categories as $category) {
                      echo "<option value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  }
                  
                  ?>
               </select> <br /><br>
               Set Image Url: <input type="text" name="productImage"><br><br>
               <input type="submit" name="addProduct" value="Add Product">
            </form><br>
	    </div>
	    
        


    </body>
    
    <footer>
        <?php 
	        include 'inc/footer.php';
	    ?>
    </footer>
</html>