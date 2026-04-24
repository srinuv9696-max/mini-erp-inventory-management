<?php
// semi-finished-stock-in.php

// Database connection
// Please replace with your database credentials
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $indent_number = $_POST['indent_number'];
    $date = $_POST['date'];
    $shift = $_POST['shift'];
    $product_name = $_POST['product_name'];
    $batch_code = $_POST['batch_code'];
    $manufacturing_date = $_POST['manufacturing_date'];
    $lot_number = $_POST['lot_number'];
    $tin_number = $_POST['tin_number'];
    $quantity = $_POST['quantity'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO semi_finished_stock_in (indent_number, date, shift, product_name, batch_code, manufacturing_date, lot_number, tin_number, quantity, remarks) VALUES ('$indent_number', '$date', '$shift', '$product_name', '$batch_code', '$manufacturing_date', '$lot_number', '$tin_number', '$quantity', '$remarks')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "\n" . $conn->error;
    }
}
?>

<form method="post">
    Indent Number: <input type="text" name="indent_number" required><br>
    Date: <input type="datetime-local" name="date" required><br>
    Shift: <input type="text" name="shift" required><br>
    Product Name: <input type="text" name="product_name" required><br>
    Batch Code: <input type="text" name="batch_code" required><br>
    Manufacturing Date: <input type="date" name="manufacturing_date" required><br>
    Lot Number: <input type="text" name="lot_number" required><br>
    TIN Number: <input type="text" name="tin_number" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    Remarks: <textarea name="remarks"></textarea><br>
    <input type="submit" value="Submit">
</form>