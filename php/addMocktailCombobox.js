function addComboBox(selectElement) {
    if (selectElement.value !== "") {
        // Create a new combobox
        const newSelect = document.createElement("select");
        var list =""
        var i;
        for (i = 0; i < x.length; i++) {
            newSelect.innerHTML = "<option>" + txt + x.options[i].text + "</option>";
          } 
        /*newSelect.innerHTML = `
            <option value="">Select an option</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        `;*/
        newSelect.onchange = function() { addComboBox(this); };

        // Append the new combobox to the container
        const container = document.getElementById("combobox-container");
        container.appendChild(newSelect);

        // Remove the onchange event from the current select to avoid adding multiple new comboboxes
        selectElement.onchange = null;
    }
}