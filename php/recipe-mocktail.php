<?php
    session_start();

    include('includes/ConnDB.php');
    $sql = "SELECT * from mocktail_recipes where id = $_SESSION['recipe_uid']"
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
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
                <h3><?php $row['title']?></h3>
                <form>
                    <div class='image'>Image</div>
                    <div class='field input'>
                        <label class="creator">Made By ...</label>
                        <label class="desc"><?php $row['description']?></label>
                        <label class="servings">Serves <?php $row['servings']?> people</label>
                        <label>Ingredients</label>
                        <label class="ingredients"><?php $row['ingredients']?></label>
                        <label >Methods</label>
                        <label class="method"><?php $row['method']?></label>
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
<?php}?>
</body>
</html>
<script type="text/javascript" src="onload.js"></script>