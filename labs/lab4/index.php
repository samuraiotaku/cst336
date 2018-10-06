<?php

    $backgroundImage = "img/sea.jpg";
    
    if (isset($_GET['keyword'])) {
        include 'api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $imageURLs = getImageURLs($keyword);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset='utf-8'>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"/>
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage?>');
                background-size: cover;
            }
        </style>
        
    </head>
    <body>
        <br>
        <form method = "GET">
            <input type = "text" name = "keyword" size = "15" placeholder = "Keyword"/>
            <input type= "radio" Horizontal name ="layout" value="horizontal"> Horizontal
            <input type= "radio" Vertical  name ="layout" value="vertical"> Vertical
            <input type = "submit" name = "submitBtn" value = "Submit"/>
        </form>
        
        <h2>You must type a keyword or select a category</h2>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++){
                        echo"<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? "class='active'" : "";
                        echo "></li>";
                    } 
                ?>
            </ol>
            
            <div class="carousel-inner" role"listbox">
                <?php
                    for($i =0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0,count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo "<img src='" . $imageURLs[$randomIndex] . "' width='200' >";
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }   
                ?>
                
                
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>            
        </div>
        <?php?
            } //end else
        ?>
        

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>