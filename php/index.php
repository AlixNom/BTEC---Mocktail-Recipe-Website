<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-home.css">
    <title>Homepage</title>
</head>

<body>

    <div class="nav">
        <div class="logo">
            Logo
        </div>
        <div class="nav-links">
            <a href="login.php">Login</a>
            <a href="register.php">Not a Member?</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION['user'])) {
    ?>
        <div class="alert-success">
            <strong>Hey!</strong> <?php echo $_SESSION['user'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </button>
        </div>
    <?php unset($_SESSION['user']); } ?>
    <div class="header">
        <h1>Homepage</h1>
        </div>

</body>

</html>