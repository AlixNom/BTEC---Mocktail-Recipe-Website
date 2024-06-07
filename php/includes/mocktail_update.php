<?php
session_start();

include 'ConnDB.php';    

    
        //$data = json_decode($_POST['ingredientArray'],true);


        if (isset($_SESSION['user'])){
            $mocktailID = stripslashes($_SESSION['id']);
            $mocktailID = mysqli_real_escape_string($conn, $mocktailID);
            $userID = stripslashes($_SESSION['user']);
            $userID = mysqli_real_escape_string($conn, $userID);
            $ingredients = stripslashes($_POST['ingredientArray']);
            $ingredients = mysqli_real_escape_string($conn,$ingredients);
            $title = stripslashes($_POST['titleMocktail']);
            $title = mysqli_real_escape_string($conn, $title);
            $method = stripslashes($_POST['method']);
            $method = mysqli_real_escape_string($conn, $method);
            $desc = stripslashes($_POST['desc']);
            $desc = mysqli_real_escape_string($conn, $desc);
            $servings = stripslashes($_POST['serving']);
            $servings = mysqli_real_escape_string($conn, $servings);
                    //$ingredientsArray = stripslashes($ingredients);
                    $sql = "UPDATE mocktail_recipes SET uid = '$userID', title = '$title', ingredients = '$ingredients', method = '$method',  description = '$desc', servings = '$servings' where id = $mocktailID";
                    $stmt = $conn->prepare($sql);
        
                    $stmt->bind_param("sssssss", $userID, $title, $ingredients, $method,  $desc, $servings, $mocktailID);
        
                    if ($stmt->execute()) {
                        $_SESSION['status-success'] = "You have updated a recipe!";
                        header("Location: ../edit-mocktail.php");
                        
                    } else {
                        $_SESSION['status-warning'] = "Was not able to update recipe!";
                        header("Location: ../edit-mocktail.php");
                    }
        
                    $stmt->close();
 
}



$conn->close();

