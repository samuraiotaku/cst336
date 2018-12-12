<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("final_project");
include 'inc/functions.php';

$sql = "DELETE FROM item WHERE ID = " . $_GET['productId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");



?>