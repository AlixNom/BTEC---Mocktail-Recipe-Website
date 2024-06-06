<?php
session_start();
include 'ConnDB.php';

$recipeID = stripslashes($_POST['recipe_id']);
$recipeID = mysqli_real_escape_string($conn, $recipeID);

$sql = "SELECT * from mocktail_recipes where id = '$recipeID'";
$stmt = mysqli_query($conn, $sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {


$_SESSION['recipe_uid'] = $recipeID;

header("Location: ../recipe-mocktail.php");}?>