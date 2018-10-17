<?php
$zodiacAnimal = array("rat", "ox", "tiger", "rabbit", "dragon", "snake", "horse", "goat", "monkey", "rooster", "dog", "pig");

    function listYears($startYear, $endYear){
        global $zodiacAnimal;
        $yearSum = 0;
        $counter = 0;
        for($i = $startYear; $i <= $endYear; $i+=4, $counter +=4) {
            if($counter > 12) {
                $counter -=11;
            }
                echo'<br><img src="img/'.$zodiacAnimal[$counter].'.png" alt="Animal Icons"/>';
                echo'<li> Year '.$i;
                if($i == 1776) echo'<strong> USA INDEPENDENCE </strong>';
                if($i % 100 == 0) echo '<strong> Happy New Century!</strong>;
                </li>';
                $yearSum += $i;
                echo "<hr>";
        }        
        echo"<br><strong>Year Sum: $yearSum</strong>";
        return $yearSum;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            body{
                text-align: center
            }

        </style>
    </head>
    <body>
        <h1>Chinese Zodiac Years</h1>
        <?php listYears($_GET["startYear"],$_GET["endYear"]); ?>

        <form method "GET">
            Start Year:
            <input type="text" name="startYear"><br>
            End Year:
            <input type="text" name="endYear"><br>
            <input type="submit" value="submit"> <br><br>
        </form>

    </body>
</html>