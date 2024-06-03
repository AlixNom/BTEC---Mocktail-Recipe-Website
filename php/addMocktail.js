//  const btnAdd = document.querySelector(".add");
// const ingredients = document.querySelector(".ingredients-list");
// const tblIngredients = document.querySelector(".ingredients-table");
// //const flex = document.querySelector(".flex");

// const JSONingredients = array();

// function removeIngredient(){
//     this.parentElement.remove();
// }
// function saveIngredient(){
//     varSaved = true;
// }

// function addIngredients(){
//     varSaved = false;
//     const addName = document.createElement("input");
//     addName.type = "text";
//     addName.name = "ingredient";
//     addName.placeholder = "Enter Ingredient";

//     const addQuantity = document.createElement("input")
//     addQuantity.type = "number";
//     addQuantity.name = "quantity";
//     addQuantity.placeholder = "Enter Quantity";

//     const addSelect = document.createElement("select")
//     addSelect.name = "measurement";
//     addSelect.innerHTML = `
//     <option value="ounces">Ounces</option>
//     <option value="milliliters">Milliliters</option>`;

//     const btnSave = document.createElement("a");
//     btnSave.className="save";
//     btnSave.innerHTML="Save";

//     const btnDelete = document.createElement("a");
//     btnDelete.className="delete";
//     btnDelete.innerHTML="&times";

//     btnDelete.addEventListener("click", removeIngredient);
//     btnSave.addEventListener("click", saveIngredient)

//     const flex = document.createElement("div");
//     flex.className="flex";
    
//     ingredients.appendChild(flex);
//     flex.appendChild(addName);
//     flex.appendChild(addQuantity);
//     flex.appendChild(addSelect);
//     flex.appendChild(btnSave);
//     flex.appendChild(btnDelete);
// }

// btnAdd.addEventListener("click", addIngredients)


let dataArray = [];

$(document).ready(function(){
    $('#add').on('click', function() {
        let valIngredient = $('#ingredient').val();
        let valAmount = $('#amount').val();
        let valMeasurement = $('#measurement').val();
        
        if (valIngredient && valAmount && valMeasurement) {
            dataArray.push({ valIngredient: valIngredient, valAmount: valAmount, valMeasurement: valMeasurement });
            updateContainer();
            $('#ingredient').val('');
            $('#amount').val('');
            $('#measurement').val('');
        }
    });

    $('#save').on('click', function() {
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: { data: JSON.stringify(dataArray) },
            success: function(response) {
                alert('Data saved successfully!');
            }
        });
    });

    function updateContainer() {
        $('#data-container').empty();
        dataArray.forEach(function(item, index) {
            $('#data-container').append(
                `<div class="flex" data-index="${index}">
                    <input type="text" value="${item.valIngredient}" class="item-input-1">
                    <input type="number" value="${item.valAmount}" class="item-input-2">
                    <select class="item-input-3">
                        <option value="Option 1" ${item.data3 === 'Option 1' ? 'selected' : ''}>Option 1</option>
                        <option value="Option 2" ${item.data3 === 'Option 2' ? 'selected' : ''}>Option 2</option>
                        <option value="Option 3" ${item.data3 === 'Option 3' ? 'selected' : ''}>Option 3</option>
                    </select>
                    <button class="edit-btn">Edit</button>
                    <button class="remove-btn">Remove</button>
                </div>`
            );
        });
        $('.edit-btn').on('click', function() {
            let index = $(this).parent().data('index');
            let newValue1 = $(this).siblings('.item-input-1').val();
            let newValue2 = $(this).siblings('.item-input-2').val();
            let newValue3 = $(this).siblings('.item-input-3').val();
            dataArray[index] = { data1: newValue1, data2: newValue2, data3: newValue3 };
        });

        $('.remove-btn').on('click', function() {
            let index = $(this).parent().data('index');
            dataArray.splice(index, 1);
            updateContainer();
        });
    }
});