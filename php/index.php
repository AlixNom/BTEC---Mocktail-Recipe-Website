<?php
session_start();

include('includes/ConnDB.php');
$recipe_id = $_SESSION['recipe_uid'];
$sql = "SELECT * FROM mocktail_recipes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recipe Detail</title>
</head>

<body>

<div class='nav'>
    <div class='logo'>Logo</div>
    <div class='nav-links'>
        <a class="links" href="index.php">Home</a>
        <a class="links" href="login.php">Login</a>
        <a class="links" href="register.php">Not a Member?</a>
    </div>
</div>

<div class='login'>
    <div class='form form-box'>
        <div class='field'>
            <a href="browse-mocktail.php" class="back">&times;</a>
        </div>
        <h3><?php echo $row['title']; ?></h3>
        <form>
            <div class='image'><img src="<?php echo $row['image']; ?>" alt="Recipe Image"></div>
            <div class='field input'>
                <label class="creator">Made By ...</label>
                <label class="desc"><?php echo $row['description']; ?></label>
                <label class="servings">Serves <?php echo $row['servings']; ?> people</label>
                <label>Ingredients</label>
                <label class="ingredients"><?php echo $row['ingredients']; ?></label>
                <label>Methods</label>
                <label class="method"><?php echo $row['method']; ?></label>
            </div>
            <div class='links'>
                Not a member yet? <a href='register.php'>Join our community</a>
            </div>
        </form>
    </div>
</div>

<section class="footer">
    <p>East Riding College, Beverley, UK | Phone: +44 74751 15553 | Email: alixzulueta@gmail.com</p>
    <p>Copyright © 2024 Alexis Zulueta</p>
</section>

</body>
</html>
<script type="text/javascript" src="onload.js"></script>
