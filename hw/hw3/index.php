<!DOCTYPE html>
<?php include 'inc/functions.php' ?>
<html>
    <head>
        <title>Adventurer's Sign-up</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
    <div id='header'>
        <img src="img/RulerCS.png">
        <h1>Adventurer Sign-up Sheet</h1>    
    </div>    

    <div id='form'>
        <!--creates form-->
        <form method "GET"><br>
            Name: <input type="text" name="Name" value = <?php echo $_GET['Name'] ?> /> <br /><br>

            Ancestry:
                <input type="radio" name="Ancestry" value= "Human" > Human 
                <input type="radio" name="Ancestry" value= "Elf" > Elf
                <input type="radio" name="Ancestry" value= "Halfling" > Halfling
                <input type="radio" name="Ancestry" value= "Dwarf" > Dwarf<br><br>
            Select Gender: 
                <input type="radio" name="Gender" value= "Male" > Male
                <input type="radio" name="Gender" value= "Female" > Female <br><br>
            Select Class:
            <select name="Class">
                <option value="Fighter">Fighter</option>
                <option value="Wizard">Wizard</option>
                <option value="Rogue">Rogue</option>
                <option value="Cleric">Cleric</option>
            </select><br>      <br>          
            Character Notes: <br>  
                <textarea name="Description" rows="5" cols="30"></textarea><br><br>
                <input type="submit" value="Create Character">
            </select>
        </form>        
    </div>
        
    <div id='sheet'>
        <?php
            createAdventurer();
        if(empty($_GET['Name'])){
            echo"<h1> <font color='red'> You forgot your name! </font></h1>";
        }
        if(empty($_GET['Ancestry'])){
             echo"<h1> <font color='red'> You forgot your ancestry! </font></h1>";
        }
        if(empty($_GET['Gender'])){
             echo"<h1> <font color='red'> You forgot your gender! </font></h1>";
        }
        if(empty($_GET['Class'])){
             echo"<h1> <font color='red'> You forgot your class! </font></h1>";
        }
        if(empty($_GET['Description'])){
             echo"<h1> <font color='red'> You forgot your note! </font></h1>";
        }    
        ?>        
    </div>    
        
    </body>
    
    <footer>
        <hr width="60%" />
            Website created by Brandon Shimizu 10/17/2018<br /> 
            Meant for academic purposes.<br />
            <img src="../../img/CSUMB.jpg" alt="This is the CSUMB logo"/>
    </footer>  
</html>