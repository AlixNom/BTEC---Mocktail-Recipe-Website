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