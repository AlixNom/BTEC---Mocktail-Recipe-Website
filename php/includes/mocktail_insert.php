<?php
session_start();

include 'ConnDB.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents("php://input");
    $json_data = json_encode($_POST['$data']);

    //$json_data = mysqli_real_escape_string($conn, $json_data);

    $sql = "INSERT INTO mocktail_recipes (ingredients) VALUES (?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $json_data);

    $stmt->close();
}
    


$conn->close();


