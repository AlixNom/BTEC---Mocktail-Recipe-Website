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

$userVal = "SELECT * from mocktail_users where uname = '$uname'";
$result = mysqli_query($conn, $userVal);
$count = mysqli_num_rows($result);

If($count>0){
    $_SESSION['status'] = "There is already a user with the same username!";
    header("Location: ../register.php");
} else {

    $sql = "INSERT INTO mocktail_users (uname, name , surname, email, dob) VALUES (?, ?, ?, ? ,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss", $uname, $name, $surname, $email, $dob);

    if ($stmt->execute()) {
        $pword_hash = stripslashes($_POST['password']);
        $pword_hash = mysqli_real_escape_string($conn, $pword_hash);
        $pword_hash = password_hash($pword_hash, PASSWORD_DEFAULT);

        $userPass = "SELECT id, uid from mocktail_users where uname = '$uname'";
        $result = $conn->prepare($userPass);

        while ( $resultPass = $result->fetch_assoc()) {
            $sql = "INSERT INTO mocktail_passwords (id, uid, pword_hash ) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $resultPass['id'], $resultPass['uid'], $pword_hash);
            
            $_SESSION['status'] = "Successfully registered as a user!";
            header("Location: ../login.php");}
    } else {
        $_SESSION['status'] = "Error with registering user!";
        header("Location: ../register.php");
    }
}

$stmt->close();
$conn->close();


