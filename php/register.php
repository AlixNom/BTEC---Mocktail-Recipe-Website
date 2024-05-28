<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>

    <!---might be better to separate the form and validation--->
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="nav-links"><a href="Index.php">Homepage</a>
            <a href="login.php">Login</a>
        </div>
        
    </div>
    <?php
    if(isset($_SESSION['status'])) {
    ?>
        <div class="alert-error">
            <strong>Hey!</strong> <?php echo $_SESSION['status'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['status']); } ?>
    <div class="login">
        <div class="form form-box">
            <h3>Register</h3>
            <form action="includes/register_insert.php" method="post">
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
                <div class="error">
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
    
</body>
</html>