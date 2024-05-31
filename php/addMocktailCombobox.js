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

        const newSelect = document.createElement("select");
        newSelect.name = `${currentID}`;
        newSelect.innerHTML = optionsHTML;
        newSelect.onchange = function() { addComboBox(this); };

        const container = document.getElementById(`${currentID}`)
        container.appendChild(newSelect);

        selectElement.onchange = null;
    }
}