const btnAdd = document.querySelector(".add");
const ingredients = document.querySelector(".ingredients-list");

//$ingredients_array = array();

function removeIngredient(){
    this.parentElement.remove();
}
function saveIngredient(){
    varSaved = true;
}

function addIngredients(){
    varSaved = false;
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

    const btnSave = document.createElement("a");
    btnSave.className="save";
    btnSave.innerHTML="Save";

    const btnDelete = document.createElement("a");
    btnDelete.className="delete";
    btnDelete.innerHTML="&times";

    btnDelete.addEventListener("click", removeIngredient);
    btnSave.addEventListener("click", saveIngredient)

    //const flex = document.createElement("div");
    //flex.className="flex";
    
    //ingredients.appendChild(flex);
    ingredients.appendChild(addName);
    ingredients.appendChild(addQuantity);
    ingredients.appendChild(addSelect);
    ingredients.appendChild(btnSave);
    ingredients.appendChild(btnDelete);
}

btnAdd.addEventListener("click", addIngredients)