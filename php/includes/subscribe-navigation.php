<?php 
session_start();
include 'ConnDB.php';
if (isset($_SESSION['user'])){
$id = stripslashes($_SESSION['user']);
$id = mysqli_real_escape_string($conn, $id);

$userVal = "SELECT subscribe from mocktail_users WHERE id = '$id' AND subscribe = 'No'";
    $stmt = mysqli_query($conn, $userVal);
    if (!$stmt) {
        die('Query Error: ' . mysqli_error($conn));
    }
    
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
         }else{
            $_SESSION['status-warning'] = "You must be logged in to view the newsletter";
            header("Location: ../login.php");
         }

mysqli_free_result($stmt);
mysqli_close($conn);