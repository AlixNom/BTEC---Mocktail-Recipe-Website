<?php
session_start();

include 'ConnDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"),true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        // Output the error and raw data for debugging
        echo "Invalid JSON input: " . json_last_error_msg();
        echo "\nRaw data: " . print_r($data, true);
        exit();
    }
    //$json_data = json_decode([$data],true);

    $ingredients = isset($data['data']) ? $data['data'] : [];
    $method = isset($data['method']) ? $data['method'] : '';

    if (isset($_SESSION['user'])){
        $userID = stripslashes($_SESSION['user']);
        $userID = mysqli_real_escape_string($conn, $userID);
        $ingredientsArray = mysqli_real_escape_string($conn, json_encode($ingredients));
        $methodArray = stripslashes($method);
        $methodArray = mysqli_real_escape_string($conn,$method);

    //$json_data = mysqli_real_escape_string($conn, $json_data);
    // if (isset($dataArray['data'])&& is_array($dataArray['data'])) {
        $sql = "INSERT INTO mocktail_recipes (uid, ingredients, method) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $ingredientsArray = stripslashes($ingredientsArray);

        $stmt->bind_param("sss", $userID, $ingredientsArray, $methodArray);

        if ($stmt->execute()) {
            $_SESSION['status'] = "You have submitted a recipe!";
            header("Location: ../index.php");
        } else {
            $_SESSION['status-warning'] = "Was not able to submit recipe!";
            header("Location: ../submit_mocktail.php");
        }

        $stmt->close();
    // } else {
    //     echo "Error preparing statement: " . $conn->error;
    // }
// } else {
//     echo "Invalid data!";
// }
} else {
    $_SESSION['status-warning'] = "You must be logged in to submit a recipe";
    header("Location: ../submit_mocktail.php");
        
}}



$conn->close();


