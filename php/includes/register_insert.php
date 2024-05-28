<?php
session_start();

include 'ConnDB.php';

$sql = "INSERT INTO mocktail_users (uname, name , surname, email, dob) VALUES (?, ?, ?, ? ,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sssss", $uname, $name, $surname, $email, $dob);

$uname = stripslashes($_POST['username']);
$uname = mysqli_real_escape_string($conn, $uname);
$name = stripslashes($_POST['firstName']);
$name = mysqli_real_escape_string($conn, $name);
$surname = stripslashes($_POST['surname']);
$surname = mysqli_real_escape_string($conn, $surname);
$email = stripslashes($_POST['email']);
$email = mysqli_real_escape_string($conn, $email);
$dob = date("Y-m-d H:i:s");
if ($stmt->execute()) {
    $_SESSION['status'] = "Sucessfully registered as a user!";
    header("Location: ../login.php");
} else {
    $_SESSION['status'] = "Error with registering user!";
    header("Location: register.php");
}

$stmt->close();
$conn->close();


