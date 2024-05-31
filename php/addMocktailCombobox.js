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
document.addEventListener("DOMContentLoaded", function() {
    var selectBox = document.getElementById("combobox-1");
    var inputContainer = document.getElementById("amount-form");
  
    selectBox.addEventListener("change", function() {
      var selectedOption = selectBox.value;
  
      // Clear previous input and label
      inputContainer.innerHTML = "";
  
      if (selectedOption) {
        var label = document.createElement("label");
        label.textContent = "Enter value:";
        
        var input = document.createElement("input");
        input.type = "text";
        input.name = "userInput"; // PHP will use this name to retrieve the value
        
        inputContainer.appendChild(label);
        inputContainer.appendChild(input);
      }
    });
  });
/*function addComboBox(selectElement) {
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
}*/