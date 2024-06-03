const btnAdd = document.querySelector(".add");
const ingredients = document.querySelector(".ingredients-list");

$ingredients_array = array();

function removeIngredient(){
    this.parentElement.remove();
}

function addIngredients(){
    const addName = document.createElement("input");
    addName.type = "text";
    //addName.name = "ingredient";
    addName.placeholder = "Enter Ingredient";

    const addQuantity = document.createElement("input")
    addQuantity.type = "number";
    //addQuantity.name = "quantity";
    addQuantity.placeholder = "Enter Quantity";

    const addSelect = document.createElement("select")
    //addSelect.name = "measurement";
    addSelect.innerHTML = `
    <option value="ounces">Ounces</option>
    <option value="milliliters">Milliliters</option>`;

    // btnSave = document.createElement("a");
    //btnSave.className="save";
    //btnSave.innerHTML="Edit";

    const btnDelete = document.createElement("a");
    btnDelete.className="delete";
    btnDelete.innerHTML="&times";

    btnDelete.addEventListener("click", removeIngredient)

    const flex = document.createElement("div");
    flex.className="flex";
    
    ingredients.appendChild(flex);
    flex.appendChild(addName);
    flex.appendChild(addQuantity);
    //flex.appendChild(addSelect);
    flex.appendChild(btnDelete);
}

btnAdd.addEventListener("click", addIngredients)