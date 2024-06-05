<?php
session_start();

include 'ConnDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents("php://input");
    $xml = simplexml_load_string($data);
    $json = json_encode($xml);
    $json_data = json_decode([$json],true);

    $ingredients = isset($json_data['data']) ? $json_data['data'] : [];
    $method = isset($json_data['method']) ? $json_data['method'] : '';

    if (isset($_SESSION['user'])&& !empty($ingredients) && !empty($method)) {
        $userID = stripslashes($_SESSION['user']);
        $userID = mysqli_real_escape_string($conn, $userID);
        $ingredientsArray = mysqli_real_escape_string($conn, json_encode($ingredients));
        $methodArray = stripslashes($method);
        $methodArray = mysqli_real_escape_string($conn, $methodArray);

    //$json_data = mysqli_real_escape_string($conn, $json_data);
    // if (isset($dataArray['data'])&& is_array($dataArray['data'])) {
        $sql = "INSERT INTO mocktail_recipes (id, ingredients, method) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sss", $userID, $ingredientsArray, $methodArray);

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
        
}}



$conn->close();


