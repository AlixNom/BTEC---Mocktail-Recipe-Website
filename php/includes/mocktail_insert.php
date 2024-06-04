<?php
session_start();

include 'ConnDB.php';

$json_data = stripslashes($_POST['q']);
$json_data = mysqli_real_escape_string($conn, $json_data);

$sql = "INSERT INTO mocktail_recipes (ingredients) VALUES (?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $json_data);

$stmt->close();
$conn->close();


