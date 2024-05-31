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
                <form action='' method='post'>
                    <div class="recipe-field input" id="combobox-1">
                        <label for="sprite">Base Sprite</label>
                        <div class = "recipe-content">
                            <select id ="combobox-1">
                                <option value="">Select an Base Sprite</option>
                                <option value="option1">Brandy</option>
                                <option value="option2">Gin</option>
                                <option value="option3">Rum</option>
                                <option value="option4">Rhye Whiskey</option>
                                <option value="option5">Tequila</option>
                                <option value="option6">Vodka</option>
                                <option value="option7">Whiskey</option>
                            </select>
                            <div class='recipe-input'>
                                <label for='amount'>Amount</label>
                                <input type='text' name='amount' id='amount' required>
                            </div>
                            <select id ="unit">
                                <option value="">Select an Base Sprite</option>
                                <option value="option1">Ounce</option>
                                <option value="option2">ml</option>

                            </select>
                        </div>
                    </div>
                    <div class="field input" id="combobox-2">
                        <label for="sprite">Wine</label>
                        <select name="combobox-2" onchange="addComboBox(this)">
                            <option value="">Select an Wine</option>
                            <option value="option1">Dry White Wine</option>
                            <option value="option2">Red Wine</option>
                            <option value="option3">Sherry</option>
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