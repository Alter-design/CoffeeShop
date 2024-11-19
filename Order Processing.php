<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #CD6305;
        }
        p {
            font-size: 18px;
        }
        .button {
            background-color: #CD6305;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #AB7F6E;
        }
    </style>
</head>
<body>
<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $coffeeType = htmlspecialchars($_POST['coffeeType']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $customerName = htmlspecialchars($_POST['customerName']);

    // Insert data into the database
    $sql = "INSERT INTO Orders (coffeeType, quantity, customerName) VALUES ('$coffeeType', $quantity, '$customerName')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Thank You for Your Order!</h1>";
        echo "<p>Order Details:</p>";
        echo "<p><strong>Coffee:</strong> $coffeeType</p>";
        echo "<p><strong>Quantity:</strong> $quantity</p>";
        echo "<p><strong>Customer Name:</strong> $customerName</p>";
        echo "<p>Your order has been placed successfully!</p>";
    } else {
        echo "<h1>Order Error</h1>";
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
} else {
    echo "<h1>Order Error</h1>";
    echo "<p>Something went wrong. Please try again.</p>";
}

// Close the connection
$conn->close();
?>
<a href="index.html" class="button">Return to Homepage</a>
</body>
</html>
