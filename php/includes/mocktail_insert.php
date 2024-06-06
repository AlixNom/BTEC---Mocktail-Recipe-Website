<?php
session_start();

include 'ConnDB.php';

    $data = json_decode($_POST['ingredientArray'],true);


    if (isset($_SESSION['user'])){
        $userID = stripslashes($_SESSION['user']);
        $userID = mysqli_real_escape_string($conn, $userID);
        $ingredients = json_encode($data['data']);
        $title = stripslashes($_POST['title']);
        $title = mysqli_real_escape_string($conn, $title);
        $method = stripslashes($_POST['method']);
        $method = mysqli_real_escape_string($conn, $method);
        

    
        $sql = "INSERT INTO mocktail_recipes (uid, title, ingredients, method) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $ingredientsArray = stripslashes($ingredients);

        $stmt->bind_param("sss", $userID, $title, $ingredientsArray, $method);

        if ($stmt->execute()) {
            $_SESSION['status'] = "You have submitted a recipe!";
            header("Location: ../index.php");
        } else {
            $_SESSION['status-warning'] = "Was not able to submit recipe!";
            header("Location: ../submit_mocktail.php");
        }

        $stmt->close();
} else {
    $_SESSION['status-warning'] = "You must be logged in to submit a recipe";
    header("Location: ../submit_mocktail.php");
        
}



$conn->close();

