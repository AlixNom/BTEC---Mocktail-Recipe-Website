<?php
session_start();
include 'config.php'; // Include your database connection

if(isset($_SESSION['user_id'])) {
    //$user_id = $_SESSION['user_id'];
    $id = $_GET['edit']
    // Fetch the ingredients for the specific user or recipe
    $query = "SELECT * FROM mocktail_recipes WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $ingredients = array();
    while($row = mysqli_fetch_assoc($result)) {
        $ingredients[] = $row;
    }
    //header("Location: ../test.php");
    echo json_encode($ingredients);
}
?>
