<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <?php
    include'includes/ConnDB.php';
//request or post?
        if(isset($_REQUEST['uname'])) {
            $uname = stripslashes($_REQUEST['uname']);
            $uname = mysqli_real_escape_string($conn, $uname);
            $name = stripslashes($_REQUEST['name']);
            $name = mysqli_real_escape_string($conn, $name);
            $surname = stripslashes($_REQUEST['surname']);
            $surname = mysqli_real_escape_string($conn, $surname);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($conn, $email);
            $dob = date("Y-m-d H:i:s");
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            $query = "INSERT INTO mocktail_users (uname, name, surname, email, dob, password)
                     VALUES ('$uname',  '$name',  '$surname',  '$email', '$dob', '" . md5($password) . "')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
                echo "<div class='login'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='login'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                      </div>";
            }
            } else {
    ?>

    <!---might be better to separate the form and validation--->
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="nav-links"><a href="Index.php">Homepage</a>
            <a href="login.php">Login</a>
        </div>
        
    </div>
    <div class="login">
        <div class="form form-box">
            <h3>Register</h3>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="userName" required autocomplete="off">
                </div>
                <div class="field input">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" required>
                </div>
                <div class="field input">
                    <label for="surname">Last Name</label>
                    <input type="text" name="surname" id="surName" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob"  required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="hint">
                   Must be at least 8 characters
                </div>
                <div class="field">
                    <input type="submit" name="submit" class="button"value="Register" required>
                </div>
                <div class="links">
                    Already have a member? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
    
</body>
</html>
