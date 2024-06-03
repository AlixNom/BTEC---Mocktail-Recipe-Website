const btnAdd = document.querySelector(".add");
const ingredients = document.querySelector(".ingredients-list");
const tblIngredients = document.querySelector(".ingredients-table");
//const flex = document.querySelector(".flex");

let JSONingredients = {};

function removeIngredient(){
    this.parentElement.remove();
}
function saveIngredient(){
    varSaved = true;
}

function addIngredients(){
    const addName = document.createElement("input");
    addName.type = "text";
    addName.name = "ingredient";
    addName.placeholder = "Enter Ingredient";

    const addQuantity = document.createElement("input")
    addQuantity.type = "number";
    addQuantity.name = "quantity";
    addQuantity.placeholder = "Enter Quantity";

    const addSelect = document.createElement("select")
    addSelect.name = "measurement";
    addSelect.innerHTML = `
    <option value="ounces">Ounces</option>
    <option value="milliliters">Milliliters</option>`;

    const btnEdit = document.createElement("a");
    btnEdit.className="edit";
    btnEdit.innerHTML="Edit";

    const btnDelete = document.createElement("a");
    btnDelete.className="delete";
    btnDelete.innerHTML="&times";

    btnDelete.addEventListener("click", removeIngredient);
    btnEdit.addEventListener("click", saveIngredient)

    const flex = document.createElement("div");
    flex.className="flex";
    
    ingredients.appendChild(flex);
    flex.appendChild(addName);
    flex.appendChild(addQuantity);
    flex.appendChild(addSelect);
    flex.appendChild(btnEdit);
    flex.appendChild(btnDelete);
}

btnAdd.addEventListener("click", addIngredients)


//--------------------------------------

// let dataArray = [];

// $(document).ready(function(){
//     $('#add').on('click', function() {
//         let valIngredient = $('#ingredient').val();
//         let valAmount = $('#amount').val();
//         let valMeasurement = $('#measurement').val();
        
//         if (valIngredient && valAmount && valMeasurement) {
//             dataArray.push({ valIngredient: valIngredient, valAmount: valAmount, valMeasurement: valMeasurement });
//             updateContainer();
//             $('#ingredient').val('');
//             $('#amount').val('');
//             $('#measurement').val('');
//         }
//     });

//     $('#submit').on('click', function() {
//         $.ajax({
//             url: 'process.php',
//             type: 'POST',
//             data: { data: JSON.stringify(dataArray) },
//             success: function(response) {
//                 alert('Data saved successfully!');
//             }
//         });
//     });

//     function updateContainer() {
//         $('#flex').empty();
//         dataArray.forEach(function(item, index) {
//             $('#flex').append(
//                 `<div class="flex" data-index="${index}">
//                     <input type="text" value="${item.valIngredient}" class="item-input-1">
//                     <input type="number" value="${item.valAmount}" class="item-input-2">
//                     <select class="item-input-3">
//                         <option value="option-1" ${item.valMeasurement === 'option-1' ? 'selected' : ''}>No Measurement</option>
//                         <option value="option-2" ${item.valMeasurement === 'option-2' ? 'selected' : ''}>Ounces</option>
//                         <option value="option-3" ${item.valMeasurement === 'option-3' ? 'selected' : ''}>Milliliters</option>
//                     </select>
//                     <button class="edit">Edit</button>
//                     <button class="delete">Remove</button>
//                 </div>`
//             );
//         });
//         $('.edit').on('click', function() {
//             let index = $(this).parent().data('index');
//             let newValue1 = $(this).siblings('.item-input-1').val();
//             let newValue2 = $(this).siblings('.item-input-2').val();
//             let newValue3 = $(this).siblings('.item-input-3').val();
//             dataArray[index] = { valIngredient: newValue1, valAmount: newValue2, valMeasurement: newValue3 };
//         });

//         $('.delete').on('click', function() {
//             let index = $(this).parent().data('index');
//             dataArray.splice(index, 1);
//             updateContainer();
//         });
//     }
// });