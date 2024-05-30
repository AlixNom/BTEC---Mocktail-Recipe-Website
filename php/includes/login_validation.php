<?php session_start();
include 'ConnDB.php';

$user = stripslashes($_POST['user']);
$user = mysqli_real_escape_string($conn, $user);
$password = $_POST['password'];
$hashed = password_hash($password, PASSWORD_DEFAULT);
//echo $hashed;//echo $user;
$userVal = "SELECT id, uname from mocktail_users where uname = '$user'";


$stmt = mysqli_query($conn, $userVal);
$count = mysqli_num_rows($stmt);

if( $count > 0){
        $result = $stmt->get_result();
        while ($rowUser = $result->fetch_assoc()) {
            $id = $rowUser['id'];
            $passVal = "SELECT pword_hash from mocktail_passwords where id = $id";

            $stmt = $conn->prepare($passVal);
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }
            if ($stmt->execute() === false) {
                die("Error executing statement: " . $stmt->error);
            }

            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $valid = password_verify($password,$row['pword_hash']);
                echo $valid;
                if ($valid == true) {
                    $_SESSION['user'] = $row['uname'];
                    header("Location: ../index.php");
                }
                if ($valid == false) {
                    $_SESSION['status-warning'] = "Incorrect Password/Username. Please Try Again!";
                    header("Location: ../login.php");
                }}}
            } else {
                $_SESSION['status-warning'] = "Incorrect Password/Username. Please Try Again!";
                header("Location: ../login.php");
            }
$conn -> close();
$stmt->close();
                //$_SESSION['status'] = "Incorrect Password/Username. Please Try Again!";
                //header("Location: ../login.php");
//header('Location:index.php');