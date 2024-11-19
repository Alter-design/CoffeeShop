<?php
require 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $coffeeType = $_POST['coffeeType'];
    $customerName = $_POST['customerName'];
    $quantity = $_POST['quantity'];

    // Insert the order into the database
    $sql = "INSERT INTO orders (coffeeType, customerName, quantity, orderDate) 
            VALUES ('$coffeeType', '$customerName', $quantity, NOW())";

    if ($conn->query($sql) === TRUE) {
        // Order inserted successfully
        echo "<p>Order placed successfully!</p>";
        echo "<p><strong>Your Order:</strong></p>";
        echo "<p>Customer Name: $customerName</p>";
        echo "<p>Coffee Type: $coffeeType</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Order Date: " . date('Y-m-d H:i:s') . "</p>";
        echo "<a href='Order Coffee.php'>Go back to order page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
