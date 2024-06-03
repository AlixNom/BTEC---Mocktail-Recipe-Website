const btnAdd = document.querySelector(".add");
const ingredients = document.querySelector(".ingredients-list");

function addIngredients(){
    const addName = document.createElement("input");
    addName.type = "text";
    addName.placeholder = "Enter Ingredient";

    const addQuantity = document.createElement("input")
    addQuantity.type = "number";
    addQuantity.placeholder = "Enter Quantity";

    const addSelect = document.createElement("select")
    addSelect.innerHTML = `
    <option value="ounces">Ounces</option>
    <option value="milliliters">Milliliters</option>`;

    const btn = document.createElement("a");
    btn.className="delete";
    btn.innerHTML="&times";

    const flex = document.createElement("div");
    flex.className="flex";
    
    ingredients.appendChild(flex);
    flex.appendChild(addName);
    flex.appendChild(addQuantity);
    flex.appendChild(addSelect);
    flex.appendChild(btn);
}

btnAdd.addEventListener("click", addIngredients)