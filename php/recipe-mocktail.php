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
            <a class="links" href="index.php">Home</a>
            <a class="links" href="login.php">Login</a>
            <a class="links" href="register.php">Not a Member?</a>
        </div>
    
</div>

    <div class='login'>
            <div class='form form-box'>
                <div class='field'>
                        <a href ="browse-mocktail.php" class= "back">&times;</a>
                </div>
                <h3>Title</h3>
                <form>
                    <div class='image'>Image</div>
                    <div class='field input'>
                        <label class="creator">Made By Creator</label>
                        <label class="desc">Description</label>
                        <label class="servings">Servings</label>
                        <label class="ingredients">Ingredients</label>
                        <label class="method">Methods</label>
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
</body>
</html>
<script type="text/javascript" src="onload.js"></script>