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
</head>

<body>

<div class='nav'>
        <div class='logo'>
            Logo
        </div>
        <div class='nav-links'>
            <a href='Index.php'>Homepage</a>
            <a href='register.php'>Register</a>
        </div>
    
</div>
<?php
if(isset($_SESSION['status'])) {
?>
    <div class="alert-success">
        <strong>Hey!</strong> <?php echo $_SESSION['status'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
  </button>
    </div>
<?php unset($_SESSION['status']); } ?>

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

</body>
</html>
<script type="text/javascript" src="onload.js"></script>