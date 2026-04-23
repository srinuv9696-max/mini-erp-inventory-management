<?php
// Product Master Logic

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form data for products
    // Code to save product data to database
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Master</title>
</head>
<body>
    <h1>Product Master Form</h1>
    <form method="POST">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
