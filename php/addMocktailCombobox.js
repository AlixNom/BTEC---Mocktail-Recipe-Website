/*function addComboBox(selectElement) {
    if (selectElement.value !== "") {
        const newSelect = document.createElement("select");
        newSelect.name = "combobox";
        newSelect.innerHTML = `
            <option value="">Select an option</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        `;
        newSelect.onchange = function() { addComboBox(this); };

        const container = document.getElementById("combobox");
        container.appendChild(newSelect);

        selectElement.onchange = null;
    }
}*/
function addComboBox(selectElement) {
    if (selectElement.value !== "") {

        const optionsHTML = selectElement.innerHTML;
        const currentID = selectElement.name;

        const newComboForm = document.createElement("div");
        newComboForm.className = "combo-form";

        const textInput = document.createElement("input");
        textInput.type = "text";
        textInput.name = "amount";
        textInput.placeholder = "e.g 0.5";

        const newSelect = document.createElement("select");
        newSelect.name = `${currentID}`;
        newSelect.innerHTML = optionsHTML;
        newSelect.onchange = function() { addComboBox(this); };

        // Create a remove button
        const removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.innerText = "Remove";
        removeButton.onclick = function() { removeComboBox(newComboForm); };
        
        // Append the wrapper to the container

        const container = document.getElementById(`${currentID}`)
        container.appendChild(newSelect,newComboForm);

        selectElement.onchange = null;
    }
}