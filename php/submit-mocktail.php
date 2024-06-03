<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-submit.css">
    <title>Submit Mocktail</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class='login'>
            <div class='form form-box'>
                <div class='wrap'>
                <h3>Make a Cocktail</h3>
                <a href="#" class="add">&plus;</a>
                </div>
                <form action='mocktail_insert.php' method='post'>
                <div class="ingredients-list">	
                </div>
                <div class='field input'>
                        <label for='method'>Method</label>
                        <input type='text' name='method' id='method' required>
                </div>
                <div class='field'>
                    <input type='submit' name='submit' class='button'value='Submit Recipe' required>
                </div>
                </form>
            </div>
    </div>
    

    <script src="addMocktail.js"></script>
</body>
</html>