<?php
session_start();

include('includes/ConnDB.php');
$recipe_id = stripslashes($_SESSION['recipe_uid']);
$sql = "SELECT * FROM mocktail_recipes WHERE id = $recipe_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$json = $row['ingredients'];
$ingredientArray = json_decode($json, true);
$ingredients = "";
foreach ($ingredientArray as $ingredient) {
    $valIngredient = isset($ingredient['Ingredient']) ? $ingredient['Ingredient'] : 'N/A';
    $valAmount = isset($ingredient['Amount']) ? $ingredient['Amount'] : 'N/A';
    $valUnit = isset($ingredient['Unit']) ? $ingredient['Unit'] : 'N/A';
        

    $ingredients .= "-  $valIngredient       $valAmount$valUnit <br>";
}
$creatorID = $row['uid'];
$sqlUser = "SELECT uname FROM mocktail_users WHERE id = $creatorID";
$stmtUser = $conn->prepare($sqlUser);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();
$method = $row['method'];
$method = str_replace("\r\n", "<br>", $method);
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
                <label class="creator">Made By <?php echo $resultUser;?></label><br></br><br></br>
                <h2>Description</h2>
                <label class="label"><?php echo $row['description']; ?></label><br></br><br></br>
                <label class="label">-   Serving for <?php echo $row['servings']; ?></label><br></br><br></br>
                <h2>Ingredients</h2>
                <label class="label"><?php echo $ingredients; ?></label><br><br>
                <h2>Methods</h2>
                <label class="label"><?php echo $method; ?></label><br></br><br></br>
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

