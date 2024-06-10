<?php
session_start();
//require_once('includes/register_insert.php')
//include('includes/register_insert.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<div class='nav'>
        <div class='logo'>
        Mocktail
        </div>
        <div class='nav-links'>
            <a class="links" href="index.php">Home</a>
            <a class="links" href="login.php">Login</a>
            <a class="links" href="register.php">Not a Member?</a>
        </div>
    
</div>

<?php
if(isset($_SESSION['status-warning'])) {
?>
    <div class="alert-error">
        <strong>Invalid!</strong> <?php echo $_SESSION['status-warning'];?>
    </div>
<?php unset($_SESSION['status-warning']); } ?>

    <div class='login'>
            <div class='form form-box'>
                <h3>Login</h3>
                <form action='includes/login_validation.php' method='post'>
                    <div class='image'></div>
                    <div class='field input'>
                        <label for='email'>User</label>
                        <input type='text' name='user' id='user' required>
                    </div>
                    <div class='field input'>
                        <label for='password'>Password</label>
                        <input type='password' name='password' id='password' required>
                    </div>
                    <div class='field'>
                        <input type='submit' name='submit' class='button'value='Login' required>
                    </div>
                    <div class='links'>
                        Not a member yet? <a href='register.php'>Join our community</a>
                    </div>
                </form>
            </div>
        </div>
    <!--<a href='subscribe.php'>Subscribe</a>-->";
    <section class = "footer">
        <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
        <p>Copyright © 2024 Alexis Zulueta</p>
    </section>
</body>
</html>
