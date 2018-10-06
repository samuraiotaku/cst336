<?php
    function displaySymbol($someRandomValue){
            //$someRandomValue = rand(0,4);
            //$symbol ="orange";
            
            // if ($someRandomValue == 0){
            //     $symbol ="seven";
            // }
            // else if($someRandomValue == 1){
            //     $symbol ="orange";
            // }
            // else{ 
            //     $symbol ="cherry";
            // }

            switch($someRandomValue){
                case 0: $symbol = "seven";
                        break;
                case 1: $symbol = "cherry";
                        break;
                case 2: $symbol = "orange";
                        break;
                case 3: $symbol = "lemon";
                        break;
                case 4: $symbol = "grapes";
                        break;                          
            }
        
            echo "<img src ='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."'/>";
        } //end of displaySymbol()
        
    function displayPoints($someRandomValue1, $someRandomValue2, $someRandomValue3) {
            
            echo "<div id='output'>";
            if($someRandomValue1 == $someRandomValue2 && $someRandomValue2 == $someRandomValue3){
                switch($someRandomValue1){
                    case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                    case 1: $totalPoints = 500;
                        break;
                    case 2: $totalPoints = 250;
                        break;    
                }
                
                echo "<h2>You won $totalPoints points!</h2>";
            } else{
                echo "<h3> Try Again! </h3>";
            }
            echo "</div>";
        }    

    function play(){
        $someRandomValue1 = rand(0,2);
        displaySymbol($someRandomValue1);
        
        $someRandomValue2 = rand(0,2);
        displaySymbol($someRandomValue2);
        
        $someRandomValue3 = rand(0,2);
        displaySymbol($someRandomValue3);
        
        echo "<br/> random_Value1 :" .$someRandomValue1;
        echo "<br/> random_Value2 :" .$someRandomValue2;
        echo "<br/> random_Value3 :" .$someRandomValue3;
        displayPoints($someRandomValue1, $someRandomValue2, $someRandomValue3);            
    }
    
    
?>