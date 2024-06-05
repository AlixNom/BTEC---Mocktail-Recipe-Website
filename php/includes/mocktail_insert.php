<?php
session_start();

include 'ConnDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents("php://input");
    $json_data = json_encode([$data],true);
    if (isset($_SESSION['user'])) {
        $userID = stripslashes($_SESSION['user']);
        $userID = mysqli_real_escape_string($conn, $userID);
        $methods = stripslashes($_POST['method']);
        $methods = mysqli_real_escape_string($conn, $methods);

    //$json_data = mysqli_real_escape_string($conn, $json_data);
    // if (isset($dataArray['data'])&& is_array($dataArray['data'])) {
        $sql = "INSERT INTO mocktail_recipes (id, ingredients) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $userID, $json_data);

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


