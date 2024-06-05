document.getElementById('addButton').addEventListener('click', function() {
    let inputContainer = document.getElementById('inputContainer');
    let newGroup = document.createElement('div');
    newGroup.className = 'inputGroup';
    newGroup.innerHTML = `
        <input type="text" name="field1" placeholder="Field 1">
        <input type="text" name="field2" placeholder="Field 2">
        <input type="text" name="field3" placeholder="Field 3">
        <button type="button" onclick="removeInputGroup(this)">Remove</button>
    `;
    inputContainer.appendChild(newGroup);
});

function removeInputGroup(button) {
    let inputGroup = button.parentElement;
    inputGroup.remove();
}

document.getElementById('dynamicForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let inputGroups = document.getElementsByClassName('inputGroup');
    let formData = [];
    for (let group of inputGroups) {
        let inputs = group.getElementsByTagName('input');
        let data = {};
        for (let input of inputs) {
            data[input.name] = input.value;
        }
        formData.push(data);
    }
    let jsonData = JSON.stringify(formData);

    fetch('process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: jsonData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
