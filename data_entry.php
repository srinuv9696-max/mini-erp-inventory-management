<?php
// Data Entry Logic

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form data
    // Code to save data to database
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry</title>
</head>
<body>
    <h1>Data Entry Form</h1>
    <form method="POST">
        <label for="data">Enter Data:</label>
        <input type="text" id="data" name="data" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
