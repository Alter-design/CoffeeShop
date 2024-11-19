<?php
include 'db_connection.php';
session_start();

// Check if admin is logged in
if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit;
}

// Check if the product ID is provided
if (!isset($_GET['id'])) {
    die("Product ID not specified.");
}

$product_id = $_GET['id']; // Use 'id' instead of 'product_id'

// Fetch the product details
$sql = "SELECT * FROM products WHERE id = ?";
if (!$stmt = $conn->prepare($sql)) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    die("Product not found.");
}

// Update product details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $sql = "UPDATE products SET name = ?, description = ?, price = ?, image_url = ? WHERE id = ?";
    if (!$stmt = $conn->prepare($sql)) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssdsi", $name, $description, $price, $image_url, $product_id);

    if ($stmt->execute()) {
        $message = "Product updated successfully.";
    } else {
        $message = "Failed to update product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br><br>
        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br><br>
        <label>Image URL:</label><br>
        <input type="text" name="image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>" required><br><br>
        <button type="submit">Update Product</button>
        <button type="button" onclick="window.location.href='manage_products.php'">Back</button>
    </form>
</body>
</html>
