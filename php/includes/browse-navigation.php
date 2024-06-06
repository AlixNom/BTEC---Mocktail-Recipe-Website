<?php
session_start();
include 'ConnDB.php';

$recipeID = stripslashes($_POST['recipe_id']);
$recipeID = mysqli_real_escape_string($conn, $recipeID);

$sql = "SELECT * from mocktail_recipes where id = '$recipeID'";



$_SESSION['recipe_uid'] = $recipeID;

header("Location: ../recipe-mocktail.php");}?>