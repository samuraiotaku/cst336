<?php
$deck = array();
$suits = array("clubs", "diamonds", "hearts", "spades");
$p_suit;


// remove omitted suit
if (isset($_GET["suites"])) {
    global $p_suit;
    $p_suit = $_GET["suites"];
}

$indexToRemove = array_search($p_suit, $suits);
unset($suits[$indexToRemove]);
$suits = array_values($suits); //re-indexes elements in array.


for ($i = 1; $i <= 13; $i++) {
    $firstLocation = $suits[0] . "/" . $i . ".png";
    $secondLocation = $suits[1] . "/" . $i . ".png";
    $thirdLocation = $suits[2] . "/" . $i . ".png";
    array_push($deck, $firstLocation);
    array_push($deck, $secondLocation);
    array_push($deck, $thirdLocation);
}

function createTable($row, $col) {
    global $deck;
    shuffle($deck);
    echo "<table align='center'>";
    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo "<td>";
            // put image
            $index = $row * $i + $j;
            echo "<img src='cards/$deck[$index]'>";
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

//test code.
//print_r($suits);
//print_r($deck);
//print_r($_GET);
//print($indexToRemove);


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Aces vs Kings </title>
        <style>
            body{
                text-align: center;
            }
        </style>
        
    </head>
    <body>
        <h1>Aces vs Kings</h1> 
        
        <?php
            createTable($_GET["numberOfRows"], $_GET["numberOfColumns"] );
        ?>
        
        <table>
            <tr>

            </tr>
            
        </table>
        
        <form method "GET">
            Number of Rows:
            <input type="text" name="numberOfRows"><br>
            Number of Columns:
            <input type="text" name="numberOfColumns"><br>
            <select name="suites">
              <option value="clubs">Clubs</option>
              <option value="diamonds">Diamonds</option>
              <option value="hearts">Hearts</option>
              <option value="spades">Spades</option>
            </select>
            <input type="submit" value="Submit">
            


        </form>
    </body>
</html>