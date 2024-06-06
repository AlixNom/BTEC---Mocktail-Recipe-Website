

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
            <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['status']); } ?>
    <?php
    if(isset($_SESSION['status-warning'])) {
    ?>
    <div class="alert-error">
        <strong>Invalid!</strong> <?php echo $_SESSION['status-warning'];?>
        <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['status-warning']); } ?>
    <div class='login'>
            <div class='form form-box'>
                <div class='wrap'>
                <button class="owned" onclick="location.href='edit-mocktail.php'">Go Back</button>    
                <h3>Update Mocktail</h3>
                </div>
                <?php
                $sql = msqli_query($)
                ?>
                <form action="includes/mocktail_update.php" method="post" enctype="multipart/form-data"> 
                    <label>Ingredients</label>
                    <div class="ingredientsList">	
                    </div>
                    <input type="hidden" name="ingredientArray" id="ingredientArray">
                    <div class="flex-add">
                            <input type ="text" class ="ingredient" id="ingredient" placeholder = "Ingredient"></input>
                            <input type ="number" class ="amount" id="amount" placeholder = "Amount" min="1"></input>
                            <select class = "measurement" id="measurement" >
                                <option value="">Select Measurement</option>
                                <option value="ounces">Ounces</option>
                                <option value="milliliters">Milliliters</option>
                            </select>
                            <a href="#" class="add">&plus;</a>
                    </div><br></br>
                    <div class='field input'>
                            <label>Title</label>
                            <input type='text' class ='titleMocktail' name='titleMocktail' id='titleMocktail' maxlength="15" placeholder="Title" required>
                    </div>
                    <div class='field input'>
                            <label>Serving Amount</label>
                            <input type='number' class ='serving' name='serving' id='serving' maxlength="15" placeholder="Per Person" min="1" required>
                    </div><br></br>
                    <div class='field input'>
                            <label>Method</label>
                            <textarea class ='method' name='method' id='method' minlength ="10" placeholder="Step 1: 100ml of Wine..., Step 2:, Step 3:"required></textarea><br>
                    </div>
                    <div class='field input'>
                            <label>Description</label>
                            <textarea class ='desc' name='desc' id='desc' minlength ="70" maxlength="142"placeholder="Describe your mocktail to enhance the engagement of other mocktail enthusiast" required></textarea><br>
                    </div><br></br>
                    <div class='field input'>
                            <label>Image</label>
                            <input type= "file" class ='image' name='image' id='image' accept=".jpeg, .jpg, .png"value="" required></input>
                    </div>
                    <div class='field'>
                        <input type='submit' name='submit' class='submit' value='Update Recipe' required>
                    </div>
                </form>
                <?php }; ?>
            </div>
    </div>
    

    <script scr ="addMocktail.js">
    let dataArray = [];

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.add').addEventListener('click', function() {
            let Ingredient = document.querySelector('.ingredient').value;
            let Amount = document.querySelector('.amount').value;
            let Unit = document.querySelector('.measurement').value;

            if (Ingredient && Amount && Unit) {
                dataArray.push({ Ingredient: Ingredient, Amount: Amount, Unit: Unit });
                updateContainer();
                document.querySelector('.ingredient').value = '';
                document.querySelector('.amount').value = '';
                document.querySelector('.measurement').value = '';
            }
        });

        document.querySelector('.submit').addEventListener('click', function() {
            let body = JSON.stringify({data: dataArray});
            document.getElementById('ingredientArray').value = body;
         });

        function updateContainer() {
            let container = document.querySelector('.ingredientsList');
            container.innerHTML = '';
            dataArray.forEach(function(item, index) {
                let div = document.createElement('div');
                div.className = 'flex';
                div.dataset.index = index;
                div.innerHTML = `
                    <input type="text" value="${item.Ingredient}" class="item-input-1">
                    <input type="number" value="${item.Amount}" class="item-input-2 min="1">
                    <label class = "item-input-3" >${item.Unit}</label>
                    <a class = "delete">&times;</a>
                `;
                container.appendChild(div);
            });

            document.querySelectorAll('.delete').forEach(function(element) {
                element.addEventListener('click', function() {
                    let index = this.parentElement.dataset.index;
                    dataArray.splice(index, 1);
                    updateContainer();
                });
            });

            document.querySelectorAll('.item-input-1, .item-input-2, .item-input-3').forEach(function(element) {
                element.addEventListener('change', function() {
                    let index = this.parentElement.dataset.index;
                    let newIngredient = this.parentElement.querySelector('.item-input-1').value;
                    let newAmount = this.parentElement.querySelector('.item-input-2').value;
                    let newUnit = this.parentElement.querySelector('.item-input-3').value;
                    dataArray[index] = { Ingredient: newIngredient, Amount: newAmount, Unit: newUnit };
                });
            });
        }
    });
    </script>
</body>
</html>