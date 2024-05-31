function addCombobox(selectedValue) {
    const container = document.getElementById('combobox-container');
    
    // Create new input element
    const newInput = document.createElement('input');
    newInput.setAttribute('type', 'text');
    newInput.setAttribute('list', 'options');
    newInput.classList.add('combobox');

    // Insert the new input element before the current input element
    const firstCombobox = document.querySelector('.combobox');
    container.insertBefore(newInput, firstCombobox);
}

document.addEventListener('DOMContentLoaded', function() {
    const combobox = document.getElementById('combobox');
    combobox.addEventListener('change', function() {
        addCombobox(this.value);
    });
});