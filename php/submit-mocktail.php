<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Comboboxes</title>
</head>
<body>
    <div id="combobox-container">
        <select onchange="addComboBox(this)">
            <option value="">Select an option</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
    </div>

    <script src="script.js"></script>
</body>
</html>