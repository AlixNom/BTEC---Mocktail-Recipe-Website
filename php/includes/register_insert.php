<?php
session_start();

include 'ConnDB.php';



$uname = stripslashes($_POST['username']);
$uname = mysqli_real_escape_string($conn, $uname);
$name = stripslashes($_POST['firstName']);
$name = mysqli_real_escape_string($conn, $name);
$surname = stripslashes($_POST['surname']);
$surname = mysqli_real_escape_string($conn, $surname);
$email = stripslashes($_POST['email']);
$email = mysqli_real_escape_string($conn, $email);
$dob = date("Y-m-d H:i:s");

$password = stripslashes($_POST('password'));
$password = mysqli_real_escape_string($conn, $password);
$pword_hash = password_hash($password, PASSWORD_DEFAULT);

$userVal = "SELECT * from mocktail_users where uname = '$uname'";
$result = mysqli_query($conn, $userVal);
$count = mysqli_num_rows($result);

If($count>0){
    $_SESSION['status'] = "There is already a user with the same username!";
    header("Location: ../register.php");
} else {
    $userPass = "SELECT id from mocktail_users where uname = '$uname'";
    $result = $conn->prepare($userPass);
    $resultPass = $result->fetch_assoc();
    $sql = "INSERT INTO mocktail_users (uname, name , surname, email, dob) VALUES (?, ?, ?, ? ,?)";
    $sqlPass = "INSERT INTO mocktail_passwords (id, pword_hash ) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmtPass = $conn->prepare($sqlPass);

    $stmt->bind_param("sssss", $uname, $name, $surname, $email, $dob);
    $stmtPass->bind_param("ss", $row["id"], $pword_hash);
    if ($stmt->execute()) {
        $_SESSION['status'] = "Successfully registered as a user!";
        header("Location: ../login.php");
    } else {
        $_SESSION['status'] = "Error with registering user!";
        header("Location: ../register.php");
    }
}

$stmt->close();
$conn->close();


