const btnAdd = document.querySelector(".add");
const ingredients = document.querySelector(".ingredients-list");
const intIngredient = document.querySelector(".ingredient");
const intAmount = document.querySelector(".amount");
const intUnit = document.querySelector(".measurement");
const btnSubmit = document.querySelector(".submit")
//const flex = document.querySelector(".flex");

let JSONIngredientList = {};

function removeIngredient(){
    this.parentElement.remove();
}


function addIngredients(){
    if(intIngredient.value !== "" || intAmount.value !== "" ||intUnit.value !== ""){
        let JSONingredient = {name:intIngredient.value,amount:intAmount.value,unit:intUnit.value};
        JSONIngredientList = {...JSONIngredientList,JSONingredient}
        const addName = document.createElement("input");
        addName.type = "text";
        addName.value = intIngredient.value;
        addName.name = "ingredient";
        addName.placeholder = "Ingredient";

        const addQuantity = document.createElement("input")
        addQuantity.type = "number";
        addQuantity.value = intAmount.value;
        addQuantity.name = "Amount";
        addQuantity.placeholder = "Enter Quantity";

        const addSelect = document.createElement("select")
        addSelect.name = "measurement";
        addSelect.value = intUnit.value;
        addSelect.innerHTML = `
        <option value="ounces">Ounces</option>
        <option value="milliliters">Milliliters</option>`;

        const btnDelete = document.createElement("a");
        btnDelete.className="delete";
        btnDelete.innerHTML="&times";

        btnDelete.addEventListener("click", removeIngredient);

        const flex = document.createElement("div");
        flex.className="flex";
        
        ingredients.appendChild(flex);
        flex.appendChild(addName);
        flex.appendChild(addQuantity);
        flex.appendChild(addSelect);
        flex.appendChild(btnDelete);
    }
};

function submitIngredients(JSONingredientList) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        JSONingredientList = this.responseText;
    }
    xmlhttp.open("GET", "mocktail_insert.php?q=" + str);
    xmlhttp.send();
}

btnAdd.addEventListener("click", addIngredients);
btnSubmit.addEventListener("click", submitIngredients);


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