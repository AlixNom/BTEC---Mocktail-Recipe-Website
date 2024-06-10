<?php
session_start();

include 'ConnDB.php';



$id = stripslashes($_SESSION['user']);
$id = mysqli_real_escape_string($conn, $id);

$userVal = "UPDATE mocktail_users SET subscribe = 'Yes' WHERE id = '$id'";
$stmt = $conn->prepare($userVal);

if ($stmt->execute()) {
    $_SESSION['status-success'] = "Successfully joined the community!";
    header("Location: ../newsletter.php");
} else {
    $_SESSION['status-warning'] = "Error with subscribing!";
    header("Location: ../index.php");
}

$stmt->close();
$conn->close();


