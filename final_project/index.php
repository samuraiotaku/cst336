<?php
//Project Index
    include 'inc/dbConnection.php';
    include 'inc/functions.php';
    $dbConn = startConnection("final_project");
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PokeMart Online</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <script>
            function openModal() {
                $('#myModal').modal("show");
            }
        </script>
        
    </head>
    
    <header>
        <?php 
	        include 'inc/header.php';
	    ?>
    </header>
    
    <body>
	    
        <div id=Main>
            
            <h1>Product List</h1>
            
            <form>
                    <b>Product Name:</b><br>
                    <input type="text" name="productName" placeholder="Product keyword" /><br><br>
                    
                    <b>Price:</b> From: <input type="text" name="priceFrom" size="7"  /> 
                        To: <input type="text" name="priceTo" size="7" />
                    </br></br>
                    
                    Category: 
                    <select name="category">
                    <option value=""> Select one </option>
                        <?=displayCategories()?>
                    </select>
                    </br></br>
                    
                    <b>Sort By DESC: </b>
                        Price <input type="radio" name="orderBy" value="productPrice">
                        Name <input type="radio" name="orderBy" value="productName"><br>
                        </br></br>
                    
                <input type="submit" name="submit" value="Search!"/><br><br>
            </form>
            
            <?php
                if($_GET['submit'] == "Search!") {
                    echo "<h2> Results: </h2>";
                    // echo "<div id='dv2'";
                    filterProducts();
                    // echo "</div";
                }
            ?>            

        </div>
        
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Product Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe name="productModal" width="450" height="250"></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
              </div>
            </div>
          </div>
        </div>   

    </body>
    
    <footer>
        <?php 
	        include 'inc/footer.php';
	    ?>
    </footer>
</html>