<?php
session_start();

include 'ConnDB.php';    

    
        //$data = json_decode($_POST['ingredientArray'],true);


        if (isset($_SESSION['user'])){
            $mocktailID = stripslashes($_SESSION['id']);
            $mocktailID = mysqli_real_escape_string($conn, $mocktailID);
            $userID = stripslashes($_SESSION['user']);
            $userID = mysqli_real_escape_string($conn, $userID);
            $ingredients = json_encode($_POST['ingredientArray']);
            $title = stripslashes($_POST['titleMocktail']);
            $title = mysqli_real_escape_string($conn, $title);
            $method = stripslashes($_POST['method']);
            $method = mysqli_real_escape_string($conn, $method);
            $desc = stripslashes($_POST['desc']);
            $desc = mysqli_real_escape_string($conn, $desc);
            $servings = stripslashes($_POST['serving']);
            $servings = mysqli_real_escape_string($conn, $servings);
            $fileName = $_FILES['image']['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowedTypes = array('jpg','jpeg','png');
            $tempName = $_FILES['image']['tmp_name'];
            $targetPath = "../uploads/".$fileName;
                    //$ingredientsArray = stripslashes($ingredients);
                    $sql = "UPDATE mocktail_recipes SET uid = '$userID', title = '$title', ingredients = '$ingredients', method = '$method', image = '$fileName', description = '$desc', servings = '$servings' where id = $mocktailID";
                    $stmt = $conn->prepare($sql);
        
                    $stmt->bind_param("sssssss", $userID, $title, $ingredients, $method, $fileName, $desc, $servings);
        
                    if ($stmt->execute()) {
                        $_SESSION['status'] = "You have updated a recipe!";
                        header("Location: ../edit-mocktail.php");
                        
                    } else {
                        $_SESSION['status-warning'] = "Was not able to update recipe!";
                        header("Location: ../edit-mocktail.php");
                    }
        
                    $stmt->close();
 
}



$conn->close();

