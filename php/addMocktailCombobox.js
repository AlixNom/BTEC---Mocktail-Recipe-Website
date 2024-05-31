function addComboBox(selectElement) {
    if (selectElement.value !== "") {
        const newSelect = document.createElement("select");
        newSelect.name = "combobox[]";
        newSelect.innerHTML = `
            <option value="">Select an option</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        `;
        newSelect.onchange = function() { addComboBox(this); };

        const container = document.getElementById("combobox-container");
        container.appendChild(newSelect);

        selectElement.onchange = null;
    }
}