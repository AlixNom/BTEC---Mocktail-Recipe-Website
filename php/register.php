<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>

    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="nav-links">
            <a class="links" href="index.php">Home</a>
            <a class="links" href="login.php">Login</a>
            <a class="links" href="register.php">Not a Member?</a>
        </div>
        
    </div>
    <?php
    session_start();
    if(isset($_SESSION['status'])) {
    ?>
        <div class="alert-success">
            <strong>Hey!</strong> <?php echo $_SESSION['status'];?>

        </div>
    <?php unset($_SESSION['status']); } ?>
    <?php
    if(isset($_SESSION['status-warning'])) {
    ?>
    <div class="alert-error">
        <strong>Invalid!</strong> <?php echo $_SESSION['status-warning'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['status-warning']); } ?>
    <div class="login">
        <div class="form form-box">
            <h3>Register</h3>
            <form action="includes/register_insert.php" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="userName" minlength = "2" maxlength="40" required autocomplete="off">
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
                    <input type="text" name="email" id="email" minlength= "10" required>
                </div>
                <div class="field input">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob"  required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" minlength="8" required>
                    <span id="show"><i class ="fa-regular fa-eye-slash"></i></span>
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
    <section class = "footer">
        <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
        <p>Copyright © 2024 Alexis Zulueta</p>
    </section>
    <script>
        $('.close').click(function() {
            $(this).parent('.alert').hide();
        });
    </script>
</body>
</body>
</html>