<?php
session_start(); //starts or resumes an existing session.


$_SESSION["my_name"] = Brandon;

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Getting a Session Variable </title>
    </head>
    <body>

        <h1> My name is <? $SESSION["my_name"] ?> </h1>


    </body>
</html>