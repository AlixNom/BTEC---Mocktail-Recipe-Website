<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    include 'includes/connDB.php';
    $sql = "INSERT INTO mocktail_users (uname, name , email, socials) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $uname, $name, $email, $socials);
    echo'
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
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" required>
                </div>
                <div class="field input">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" id="surname" required>
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
    ';
    ?>
</body>
</html>