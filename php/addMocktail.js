 const btnAdd = document.querySelector(".add");
// const ingredients = document.querySelector(".ingredients-list");
// const tblIngredients = document.querySelector(".ingredients-table");
// //const flex = document.querySelector(".flex");

// //$ingredients_array = array();

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

$(document).ready(function() {
    $('#addItemButton').click(function() {
        var itemText = $('#itemInput').val();
        if (itemText !== '') {
            $.ajax({
                url: 'mocktail_insert.php',
                type: 'POST',
                data: { item: itemText },
                success: function(response) {
                    $('#itemList').append('<li>' + itemText + ' <button class="removeButton" data-id="' + response.id + '">Remove</button></li>');
                    $('#itemInput').val(''); // Clear input field
                }
            });
        }
    });

    $(document).on('click', '.removeButton', function() {
        var itemId = $(this).data('id');
        var listItem = $(this).parent();
        $.ajax({
            url: 'remove_item.php',
            type: 'POST',
            data: { id: itemId },
            success: function(response) {
                if (response.success) {
                    listItem.remove();
                }
            }
        });
    });
});