<?php
session_start();
$id = $_GET['edit'];
$_SESSION['id'] = $id;?>
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

<div class='login'>
    <div class='form form-box'>
        <div class='wrap'>
            <h3>Make a Mocktail</h3>
        </div>
        <form action="includes/mocktail_insert.php" method="post" enctype="multipart/form-data">
            <label>Ingredients</label>
            <div class="ingredientsList">   
            </div>
            <input type="hidden" name="ingredientArray" id="ingredientArray">
            <div class="flex-add">
                <input type ="text" class ="ingredient" id="ingredient" placeholder = "Ingredient"></input>
                <input type ="number" class ="amount" id="amount" placeholder = "Amount" min="1"></input>
                <select class = "measurement" id="measurement">
                    <option value="">Select Measurement</option>
                    <option value="ounces">Ounces</option>
                    <option value="milliliters">Milliliters</option>
                </select>
                <a href="#" class="add">&plus;</a>
            </div><br>
            <!-- Other form fields... -->
            <div class='field'>
                <input type='submit' name='submit' class='submit' value='Submit Recipe' required>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
let dataArray = [];

document.addEventListener('DOMContentLoaded', function() {
    // Fetch existing ingredients from the database
    fetch('fetch_test.php')
        .then(response => response.json())
        .then(data => {
            dataArray = data;
            updateContainer();
        });

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
                <input type="number" value="${item.Amount}" class="item-input-2" min="1">
                <label class="item-input-3">${item.Unit}</label>
                <a class="delete">&times;</a>
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
                let newUnit = this.parentElement.querySelector('.item-input-3').innerText;
                dataArray[index] = { Ingredient: newIngredient, Amount: newAmount, Unit: newUnit };
            });
        });
    }
});
</script>
</body>
</html>
