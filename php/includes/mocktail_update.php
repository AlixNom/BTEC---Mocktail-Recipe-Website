<?php
session_start();

include 'ConnDB.php';    

    
        //$data = json_decode($_POST['ingredientArray'],true);


        if (isset($_SESSION['user'])){
            $mocktailID = stripslashes($_SESSION['id']);
            $mocktailID = mysqli_real_escape_string($conn, $mocktailID);
            $userID = stripslashes($_SESSION['user']);
            $userID = mysqli_real_escape_string($conn, $userID);
            $title = stripslashes($_POST['titleMocktail']);
            $title = mysqli_real_escape_string($conn, $title);
            $method = stripslashes($_POST['method']);
            $method = mysqli_real_escape_string($conn, $method);
            $desc = stripslashes($_POST['desc']);
            $desc = mysqli_real_escape_string($conn, $desc);
            $servings = stripslashes($_POST['serving']);
            $servings = mysqli_real_escape_string($conn, $servings);
                    //$ingredientsArray = stripslashes($ingredients);
                    $sql = "UPDATE mocktail_recipes SET uid = ?, title = ?, method = ?,  description = ?, servings = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
        
                    $stmt->bind_param("ssssis", $userID, $title, $method, $desc, $servings ,$mocktailID);
        
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

