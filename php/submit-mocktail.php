<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

    <div class='login'>
            <div class='form form-box'>
                <h3>Make a Cocktail</h3>
                <form action='includes/login_validation.php' method='post'>
                    <div class="field input" id="combobox-container">
                    <input name='combobox'>
                        <select onchange="addComboBox(this)">
                            <option value="">Select an option</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
                    </div>
                    <div class='field'>
                        <input type='submit' name='submit' class='button'value='Submit Recipe' required>
                    </div>
                </form>
            </div>
        </div>

    <script src="addMocktailCombobox.js"></script>
</body>
</html>