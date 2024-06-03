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

    <div class='login'>
            <div class='form form-box'>
                <div class='wrap'>
                <h3>Make a Cocktail</h3>
                <a href="#" class="add">&plus;</a>
                </div>
                <form action='mocktail_insert.php' method='post'>
                <div class="ingredients-list">	
                    <div class = "flex">	
                        <table class="ingredients-table" id="dynamic_input">
				            <tr>
					        <td><input type="text" class="ingredient" name="ingredient" placeholder="Enter Ingredient"/></td>
                            <td><input type="number" class="amount" name="ingredient" placeholder="Enter Amount"/></td>
					        <td><select class="measurement" name="measurement">
                                <option value="ounces">Ounces</option>
                                <option value="milliliters">Milliliters</option>
                            </select></td>
                            <td><a class="save">&check;</a></td>
                            <td><a class="delete">&times;</a></td>
				            </tr>
			            </table>
                    </div>
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