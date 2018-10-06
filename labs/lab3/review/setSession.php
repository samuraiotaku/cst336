<?php
session_start(); //starts or resumes an existing session.


$_SESSION["my_name"] = Brandon;



?>


<!DOCTYPE html>
<html>
    <head>
        <title> Setting a Session Variable </title>
    </head>
    <body>
        <!--<h1> my name is <?$Session["my_name"]?></h1>-->
    </body>
</html>