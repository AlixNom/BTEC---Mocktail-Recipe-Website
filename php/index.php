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
            <a class="links" href="login.php">Login</a>
            <a class="links" href="register.php">Not a Member?</a>
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
    <header>    
        <div class="header-content">
            <h2>Enjoy a mocktail with love ones!</h2>
            <div class="line"></div>
            <h1>LIVE LAUGH LOVE!</h1>
            <a href="#" class="ctn">Explore More</a>
        </div>
    </header>
    <section>
        <div class="title">
            <h1>Explore</h1>
            <div class="line"></div>
        </div>
        <div class ="row">
            <div class="col">
                <img src="img/mocktail-explore.jpg" alt="">
                <h4>Mocktails</h4>
                <p>Explore the varieties of mocktail recipes made by multiple of users, You'll never get tired!</p>
                <a href="#" class="ctn">Learn More</a>
            </div>
        </div>
    </section>

</body>

</html>