<?php
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
    $_SESSION['status'] = "Created a Registered User!";
    header("Location: ../login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: register.html");
}

$stmt->close();
$conn->close();


