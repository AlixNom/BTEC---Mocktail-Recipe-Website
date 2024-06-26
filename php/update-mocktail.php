
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-submit.css">
    <title>Edit Mocktail</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
    session_start();
    if(isset($_SESSION['status'])) {
    ?>
        <div class="alert-success">
            <strong>Hey!</strong> <?php echo $_SESSION['status'];?>

        </div>
    <?php unset($_SESSION['status']); } ?>
    <?php
    if(isset($_SESSION['status-warning'])) {
    ?>
    <div class="alert-error">
        <strong>Invalid!</strong> <?php echo $_SESSION['status-warning'];?>
 
    </div>
    <?php unset($_SESSION['status-warning']); } ?>
    <div class='login'>
            <div class='form form-box'>
                <div class='wrap'>
                <button class="owned" onclick="location.href='edit-mocktail.php'">Go Back</button>    
                <h3>Update Mocktail</h3>
                </div>
                <?php
                include 'includes/ConnDB.php';
                //$id = $_SESSION['id'];
                $id = $_GET['edit'];

                $sql = mysqli_query($conn, "SELECT * from mocktail_recipes where id = $id");
                while($row = mysqli_fetch_assoc($sql)){
                    $_SESSION['id'] = $id;
                ?>
                <form action="includes/mocktail_update.php" method="post" enctype="multipart/form-data"> 
                    <label><strong>Important!</strong> Ingredients cannot be updated!</label><br></br>
                    <input type="hidden" name="ingredientArray" value="<?php $row['ingredients']?>" id="ingredientArray">
                    <div class='field input'>
                            <label>Title</label>
                            <input type='text' class ='titleMocktail' name='titleMocktail' value="<?php echo $row['title'];?>" id='titleMocktail' maxlength="15" placeholder="Title" required>
                    </div>
                    <div class='field input'>
                            <label>Serving Amount</label>
                            <input type='number' class ='serving' name='serving' id='serving' maxlength="15"  min="1" value="<?php echo $row['servings'];?>" required>
                    </div><br></br>
                    <div class='field input'>
                            <label>Method</label>
                            <textarea class ='method' name='method' id='method' minlength ="10" required><?php echo $row['method'];?></textarea><br>
                    </div>
                    <div class='field input'>
                            <label>Description</label>
                            <textarea class ='desc' name='desc' id='desc' minlength ="70" maxlength="142"  required><?php echo $row['description'];?></textarea><br>
                    </div><br></br>
                    <div class='field input'>
                            <label>Image</label>
                            <label  class ='image' name='image' id='image'><?php echo $row['image'];?></label>
                    </div>
                    <div class='field'>
                        <input type='submit' name='submit' class='submit' value='Update Recipe' required>
                    </div>
                </form>
                <?php }; ?>
            </div>
    </div>

</body>
</html>