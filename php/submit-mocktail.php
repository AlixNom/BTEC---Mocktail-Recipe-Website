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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class='login'>
            <div class='form form-box'>
                <div class='wrap'>
                <h3>Make a Mocktail</h3>
                <!-- <a href="#" class="add">&plus;</a> -->
                </div>
                <form> 
                <div class="ingredientsList">	
                </div>
                <div class="flex-add">
                        <input type ="text" class ="ingredient" id="ingredient" placeholder = "Ingredient"></input>
                        <input type ="number" class ="amount" id="amount" placeholder = "Amount"></input>
                        <select class = "measurement" id="measurement" >
                            <option value="">Select Measurement</option>
                            <option value="ounces">Ounces</option>
                            <option value="milliliters">Milliliters</option>
                        </select>
                        <a href="#" class="add">&plus;</a>
                </div> 
                <div class='field input'>
                        <label for='method'>Method</label>
                        <input type='textbox' class ='method' name='method' id='method' required>
                </div>
                <div class='field'>
                    <input type='submit' name='submit' class='submit' value='Submit Recipe' required>
                </div>
                </form>
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
            let varMethod = document.querySelector('.method').value;
            let bodyContent = {
                    data: dataArray,
                    method: varMethod
                };
            fetch('includes/mocktail_insert.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(bodyContent
                )
            })
            .then(response => response.text())
            .then(data => {
                alert('Data saved successfully!');
            })
            .catch(error => console.error('Error:', error));
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
                    <input type="number" value="${item.Amount}" class="item-input-2">
                    <label class = "item-input-3" >${item.Unit}</label>

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