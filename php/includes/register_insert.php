<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <?php
    include'ConnDB.php';
//request or post? test
        if(isset($_POST['username'], ($_POST['email']))) {
            $uname = stripslashes($_POST['username']);
            $uname = mysqli_real_escape_string($conn, $uname);
            $name = stripslashes($_POST['firstName']);
            $name = mysqli_real_escape_string($conn, $name);
            $surname = stripslashes($_POST['surname']);
            $surname = mysqli_real_escape_string($conn, $surname);
            $email = stripslashes($_POST['email']);
            $email = mysqli_real_escape_string($conn, $email);
            $dob = date("Y-m-d H:i:s");
            $query = ("INSERT INTO mocktail_users (uname, name, surname, email, dob) VALUES ('$uname',  '$name',  '$surname',  '$email', '$dob')");
            $result = mysqli_query($conn, $query);
            $result->bind_param("sssss", $uname, $name, $surname, $email, $dob);
            if ($result->execute()) {
                header("Location: login.php");
            } else {
                echo "ERROR: Missing Fields" . $query . "<br>" . $conn->error;
            }

            } else {


            header("Location: register.html");
        }
    ?>
</body>
</html>
