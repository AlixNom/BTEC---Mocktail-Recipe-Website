<?php
session_start();

include 'ConnDB.php';

    $data = json_decode($_POST['ingredientArray'],true);


    if (isset($_SESSION['user'])){
        $userID = stripslashes($_SESSION['user']);
        $userID = mysqli_real_escape_string($conn, $userID);
        $ingredients = json_encode($data['data']);
        $method = stripslashes($_POST['method']);
        $method = mysqli_real_escape_string($conn, $method);
        

    
        $sql = "INSERT INTO mocktail_recipes (uid, ingredients, method) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $ingredientsArray = stripslashes($ingredients);

        $stmt->bind_param("sss", $userID, $ingredientsArray, $method);

        if ($stmt->execute()) {
            echo "Data saved successfully!";
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
} else {
echo "User session not set!";
        
}



$conn->close();


