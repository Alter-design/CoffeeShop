<?php
include 'db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $name, $description, $price, $image_url);

    if ($stmt->execute()) {
        $message = "Product added successfully.";
    } else {
        $message = "Failed to add product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    
    <!-- Back Button -->
    <button onclick="window.location.href='manage_products.php'">Back to Manage Products</button>
    <br><br>

    <!-- Product Form -->
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>
        <label>Image URL:</label><br>
        <input type="text" name="image_url" required><br><br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>

