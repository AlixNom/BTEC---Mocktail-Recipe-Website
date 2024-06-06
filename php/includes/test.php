<?php
session_start();

include 'ConnDB.php';
 
    $data = json_decode($_POST['ingredientArray'],true);
    // if (json_last_error() !== JSON_ERROR_NONE) {
    //     // Output the error and raw data for debugging
    //     echo "Invalid JSON input: " . json_last_error_msg();
    //     echo "\nRaw data: " . print_r($data, true);
    //     exit();
    // }
    //$json_data = json_decode([$data],true);

    //$ingredients = isset($data['data']) ? $data['data'] : [];
    

    if (isset($_SESSION['user'])){
        $userID = stripslashes($_SESSION['user']);
        $userID = mysqli_real_escape_string($conn, $userID);
        $ingredients = $data['data'];
        $method = stripslashes($_POST['method']);
        $method = mysqli_real_escape_string($conn, $method);
        

    //$json_data = mysqli_real_escape_string($conn, $json_data);
    // if (isset($dataArray['data'])&& is_array($dataArray['data'])) {
        $sql = "INSERT INTO mocktail_recipes (uid, ingredients, method) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $ingredientsArray = stripslashes($ingredients);

        $stmt->bind_param("sss", $userID, $ingredients, $method);

        if ($stmt->execute()) {
            echo "Data saved successfully!";
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    // } else {
    //     echo "Error preparing statement: " . $conn->error;
    // }
// } else {
//     echo "Invalid data!";
// }
} else {
echo "User session not set!";
        
}



$conn->close();


