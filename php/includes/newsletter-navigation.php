<?php
session_start();
include 'ConnDB.php';

$season = stripslashes($_POST['recipe_id']);
$season = mysqli_real_escape_string($conn, $recipeID);

$sql = "SELECT * from mocktail_recipes where id = '$recipeID'";



$_SESSION['recipe_uid'] = $recipeID;

header("Location: ../recipe-mocktail.php");?>