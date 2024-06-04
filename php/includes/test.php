<?php
include 'ConnDB.php';

// Prepare the SQL statement with placeholders
$pword_hash = stripslashes($_POST['password']);
$pword_hash = mysqli_real_escape_string($conn, $pword_hash);
$pword_hash = password_hash($pword_hash, PASSWORD_DEFAULT);

$userPass = "SELECT id from mocktail_users where uname = '$uname'";
$result = $conn->prepare($userPass);

    $sql = "INSERT INTO mocktail_passwords (id, pword_hash ) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $resultPass['id'], $pword_hash);
    

if ($stmt->execute()) {
    echo "New record created successfully";
    header("Location: ../login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: register.html");
}

// Close statement and connection
$stmt->close();
$conn->close();