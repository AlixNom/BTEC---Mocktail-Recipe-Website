<?php session_start();
include 'ConnDB.php';

$id = stripslashes($_SESSION['user']);
$id = mysqli_real_escape_string($conn, $id);
$defaultVal = 'No';

$userVal = "SELECT subscribe from mocktail_users WHERE id = '$id' AND subscribe = '${defaultVal}'";
    $stmt = mysqli_query($conn, $userVal);
    $count = mysqli_num_rows($stmt);
    if( $count === 0){
        $sql = "SELECT * from mocktail_users where id = '$id'";
        $stmt = mysqli_query($conn, $sql);
         $count = mysqli_num_rows($stmt);
         echo`row count ${$count}`;
         if( $count === 0){
            $_SESSION['status-warning'] = "You must register first before you can subscribe subscribe";
            header("Location: ../register.php");
         }else{
            $seasontmp = $_GET['season'];
            $_SESSION['season'] = $seasontmp;
            echo"test";
            header("Location: ../subscribe.php");}};


$conn -> close();
$stmt->close();
