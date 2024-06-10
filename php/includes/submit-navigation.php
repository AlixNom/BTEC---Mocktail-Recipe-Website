<?php
session_start();
include 'ConnDB.php';
if (isset($_SESSION['user'])){
    header("Location: ../submit-mocktail.php.php");

} else {
$_SESSION['status-warning'] = "You must be logged in to view your recipe";
header("Location: ../index.php");
    
}


?>