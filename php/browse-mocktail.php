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
    <header>    
        <div class="header-content">
            <h2>Browse endless amount of mocktails!</h2>
            <div class="line"></div>
        </div>
    </header>
    <section class="cocktail-section">
        <div class="title">
            <h1>Explore</h1>
            <div class="line"></div>
        </div>
        <div class ="row">
            <div class="col">
                <img src="img/mocktail-explore2.jpg" alt="">
                <h4>Cocktails</h4>
                <p>Dive into the diverse world of cocktail recipes crafted by countless enthusiasts. With such a wide array of options, you’ll always find something new and exciting to try, ensuring you'll never get tired of experimenting and discovering new flavors!</p>
                <a href="#" class="ctn">Browse</a>
            </div>
            <div class="col">
                <img src="img/mocktail-submit.jpg" alt="">
                <h4>Submit Your Own</h4>
                <p>Would you like to share your own homemade cocktail recipes for others to enjoy and appreciate? Join our vibrant community of mixology enthusiasts and showcase your unique creations. Your inventive concoctions could inspire fellow cocktail lovers and become the next big hit!</p>
                <a href="submit-mocktail.php" class="ctn">Make Recipe</a>
            </div>
            
        </div>
        <div class ="row">
            <div class="col">
                <img src="img/mocktail-newspaper.jpg" alt="">
                <h4>Newsletter</h4>
                <p>about the latest trends and updates in the cocktail world? Keep up with the current cocktail updates and discover new recipes, techniques, and innovations in mixology.</p>
                <a href="#" class="ctn">View More</a>
            </div>
            <div class="col">
                <img src="img/mocktail-poll.jpg" alt="">
                <h4>Polls/Quizzes</h4>
                <p>Challenge yourself and see how much you really know about the art of mixology, or place your opinions out!</p>
                <a href="#" class="ctn">View More</a>
            </div>
            
        </div>
    </section>
    <section class="tiptricks">
        <div class="tiptricks-content">
        <h1>SECRETS TO MAKING THE BEST COCKTAIL!</h1>
        <div class="line"></div>
        <p>Crafting the perfect cocktail is an art form that blends creativity with precision, there are numerous tips and tricks to enhance your cocktail-making skills. Here's a comprehensive guide to elevating your cocktail game:</p>
        <a href="#" class="ctn"> Learn More </a>
        </div>
    </section>
    <section class = "footer">
        <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
        <p>Copyright © 2024 Alexis Zulueta</p>
    </section>
</body>

</html>