<?php
session_start();

include 'ConnDB.php';
    if($_FILES['image']['error'] === 4){
        $_SESSION['status-warning'] = "This image doesn't exist!";
        header("Location: ../submit_mocktail.php");
    } else {
        $data = json_decode($_POST['ingredientArray'],true);


        if (isset($_SESSION['user'])){
            $userID = stripslashes($_SESSION['user']);
            $userID = mysqli_real_escape_string($conn, $userID);
            $ingredients = json_encode($data['data']);
            $title = stripslashes($_POST['titleMocktail']);
            $title = mysqli_real_escape_string($conn, $title);
            $method = stripslashes($_POST['method']);
            $method = mysqli_real_escape_string($conn, $method);
            $fileName = $_FILES['image']['name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowedTypes = array('jpg','jpeg','png');
            $tempName = $_FILES['image']['tmp_name'];
            $targetPath = "../uploads/".$fileName;
            if(in_array($ext, $allowedTypes)){
                if(move_uploaded_file($tempName, $targetPath)){
                    $sql = "INSERT INTO mocktail_recipes (uid, title, ingredients, method, image) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $ingredientsArray = stripslashes($ingredients);
        
                    $stmt->bind_param("sssss", $userID, $title, $ingredientsArray, $method, $fileName);
        
                    if ($stmt->execute()) {
                        $_SESSION['status'] = "You have submitted a recipe!";
                        header("Location: ../index.php");
                    } else {
                        $_SESSION['status-warning'] = "Was not able to submit recipe!";
                        header("Location: ../submit-mocktail.php");
                    }
        
                    $stmt->close();
                } else {
                    $_SESSION['status-warning'] = "File not uploaded!";
                    header("Location: ../submit-mocktail.php");
            }
        
    } else {
        $_SESSION['status-warning'] = "You must be logged in to submit a recipe";
        header("Location: ../submit-mocktail.php");
    }    
}
}


$conn->close();

