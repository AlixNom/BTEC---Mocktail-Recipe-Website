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
                        <input type='text' name='method' id='method' required>
                </div>
                <div class='field'>
                    <input type='submit' name='submit' class='submit' value='Submit Recipe' required>
                </div>
                </form>
            </div>
    </div>
    

    <script>
                let dataArray = [];

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.add').addEventListener('click', function() {
        let valIngredient = document.querySelector('.ingredient').value;
        let valAmount = document.querySelector('.amount').value;
        let valMeasurement = document.querySelector('.measurement').value;

        if (valIngredient && valAmount && valMeasurement) {
            dataArray.push({ valIngredient: valIngredient, valAmount: valAmount, valMeasurement: valMeasurement });
            updateContainer();
            document.querySelector('.ingredient').value = '';
            document.querySelector('.amount').value = '';
            document.querySelector('.measurement').value = '';
        }
    });

    document.querySelector('.submit').addEventListener('click', function() {
        fetch('includes/mocktail_insert.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: dataArray })
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
                <input type="text" value="${item.valIngredient}" class="item-input-1">
                <input type="number" value="${item.valAmount}" class="item-input-2">
                <select class="item-input-3">
                    <option value="Ounces" ${item.valMeasurement === 'Ounces' ? 'selected' : ''}>Ounces</option>
                    <option value="Milliliters" ${item.valMeasurement === 'Milliliters' ? 'selected' : ''}>Milliliters</option>
                </select>
                <span class="delete">&times;</span>
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
                let newValue1 = this.parentElement.querySelector('.item-input-1').value;
                let newValue2 = this.parentElement.querySelector('.item-input-2').value;
                let newValue3 = this.parentElement.querySelector('.item-input-3').value;
                dataArray[index] = { valIngredient: newValue1, valAmount: newValue2, valMeasurement: newValue3 };
            });
        });
    }
});
    // let dataArray = [];

    //  $(document).ready(function(){
    //      $('.add').on('click', function() {
    //          let valIngredient = $('.ingredient').val();
    //          let valAmount = $('.amount').val();
    //          let valMeasurement = $('.measurement').val();
            
    //          if (valIngredient && valAmount && valMeasurement) {
    //              dataArray.push({ valIngredient: valIngredient, valAmount: valAmount, valMeasurement: valMeasurement });
    //              updateContainer();
    //              $('.ingredient').val('');
    //              $('.amount').val('');
    //              $('.measurement').val('');
    //          }
    //      });

    //      $('.submit').on('click', function() {
    //          $.ajax({
    //              url: 'includes/mocktail_insert.php',
    //              type: 'POST',
    //              data: { data: JSON.stringify(dataArray) },
    //              success: function(response) {
    //                  alert('Data saved successfully!');
    //              }
    //          });
    //      });

    //      function updateContainer() {
    //          $('.ingredientsList').empty();
    //          dataArray.forEach(function(item, index) {
    //              $('.ingredientsList').append(
    //                  `<div class="flex" data-index="${index}">
    //                      <input type="text" value="${item.valIngredient}" class="item-input-1">
    //                      <input type="number" value="${item.valAmount}" class="item-input-2">
    //                      <select class="item-input-3">
    //                          <option value="option-2" ${item.valMeasurement === 'option-2' ? 'selected' : ''}>Ounces</option>
    //                          <option value="option-3" ${item.valMeasurement === 'option-3' ? 'selected' : ''}>Milliliters</option>
    //                      </select>
    //                      <a class="delete">&times;</a>
    //                  </div>`
    //              );
    //          });
    //          $('.edit').on('click', function() {
    //              let index = $(this).parent().data('index');
    //              let newValue1 = $(this).siblings('.item-input-1').val();
    //              let newValue2 = $(this).siblings('.item-input-2').val();
    //              let newValue3 = $(this).siblings('.item-input-3').val();
    //              dataArray[index] = { valIngredient: newValue1, valAmount: newValue2, valMeasurement: newValue3 };
    //          });

    //          $('.delete').on('click', function() {
    //              let index = $(this).parent().data('index');
    //              dataArray.splice(index, 1);
    //              updateContainer();
    //          });
    //      }
    //  });</script>
</body>
</html>