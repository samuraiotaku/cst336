<?php


include '../inc/dbConnection.php';
$dbConn = startConnection("final_project");
include 'inc/functions.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PokeMart Online </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

        
        <script>
        
            function confirmDelete() {
                return confirm("Are you sure You would like to Delete this Item?");
            }
            
            function openModal() {
                $('#myModal').modal("show");
            }
	          
    	    $(function(){
               $(".avgPrice").click(function(){
                   //alert("We got there!");
                var price = $(this).val();
                   $.ajax({
                        type: "GET",
                        url: "avgPrice.php",
                        dataType: "json",
                        data: { "price": price },
                        success: function(data,status) {
                            //alert(data);
                            $("#dataHolder").html("<h3>Average Price: "+ data.avgPrice +"</h3>");
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                            //alert("We did it!");
                        }
                    });//ajax
                });
                
                $(".itemCount").click(function(){
                   //alert("We got there!");
                var count = $(this).val();
                   $.ajax({
                        type: "GET",
                        url: "itemCount.php",
                        dataType: "json",
                        data: { "count": count },
                        success: function(data,status) {
                            //alert(data);
                            $("#dataHolder").html("<h3> # of Items: "+ data.itemCount +"</h3>");
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                            //alert("We did it!");
                        }
                    });//ajax
                });
                
                $(".ballCount").click(function(){
                   //alert("We got there!");
                var count = $(this).val();
                   $.ajax({
                        type: "GET",
                        url: "pokeballCount.php",
                        dataType: "json",
                        data: { "count": count },
                        success: function(data,status) {
                            //alert(data);
                            $("#dataHolder").html("<h3> # of Pokeballs: "+ data.ballCount +"</h3>");
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                            //alert("We did it!");
                        }
                    });//ajax
                });                
            });
	          

	          
        </script>
        
    </head>
    <body>
        <?php 
	        include 'inc/header.php';
	    ?>
	    
	    <div id="adminMain">
	        <h1>Admin Main Page</h1><br>
	        
	        <form action="addProduct.php">
              <input type="submit" value="Add New Product">
            </form><br>
            
            <button type="button" class = "avgPrice" name= "avgPrice" id= "avgPrice" onclick="displayAVG();">AVG Price of Items </button>
            <button type="button" class = "ballCount" name= "ballCount" id= "ballCount" >Pokeball Inventory</button>
            <button type="button" class="itemCount" name="itemCount" id= "itemCount" >Number of Items</button><br><br>

            
            <form action="logout.php">
                <input type="submit" value="Logout"><br>
            </form>

           <br><br>
           
        <div id="dataHolder"></div>   
        <div id="averagePrice"></div>  
        <?= displayAllProducts() ?>
        
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        

    </body>
</html>