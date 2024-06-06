<?php
    session_start();
    include 'includes/ConnDB.php';

    $sql = "SELECT * from mocktail_recipes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-browse.css">
    <title>Homepage</title>
</head>

<body>

    <div class="nav">
        <div class="logo">
            Logo
        </div>
        <div class="nav-links">
            <a class="links" href="index.php">Home</a>
            <a class="links" href="login.php">Login</a>
            <a class="links" href="register.php">Not a Member?</a>
        </div>
    </div>
    <header>    
        <!-- <div class="header-content">
            <h2>Browse endless amount of mocktails!</h2>
            <div class="line"></div>
        </div> -->
    </header>
    <section class="cocktail-section">
        <div class="title">
            <h1>Recipes</h1>
            <div class="line"></div>
        </div>
        <main>
            <?php
                while($row = $result->fetch_assoc()){
            ?>
            <div class = "card">
                <div class = "image">
                    <img scr="<?php echo $row['image'];?>" alt="">
                </div>
                <div class="caption">
                    <p class = "name"><?php echo $row['title'];?></p>
                    <p class = "serving">Serving: <?php echo $row['servings'];?></p>
                    <p class = "description"><?php echo $row['description'];?></p>
                </div>
                <button class = "view"> View Recipe</button>
            </div>
            <?php
            }?>
        </main>
    </section>
    <section class = "footer">
        <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
        <p>Copyright © 2024 Alexis Zulueta</p>
    </section>
</body>

</html>