<?php
include 'db_connection.php';
session_start();

// Check if admin is logged in
if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit;
}

// Handle delete request
if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id = ?"; // Use 'id' instead of 'product_id'
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        $message = "Product deleted successfully.";
    } else {
        $message = "Failed to delete product.";
    }
}

// Fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        button {
            padding: 5px 10px;
            border: none;
            background-color: #AB7F6E;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #CD6305;
        }
    </style>
</head>
<body>
    <h1>Manage Products</h1>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <!-- Add Product Button -->
    <button onclick="window.location.href='add_product.php'">Add New Product</button>
	<div class="navbar">
        <a href="admin_dashboard.php">Dashboard</a>
	</div>

    <!-- Display Products -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td> <!-- Use 'id' instead of 'product_id' -->
                <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" width="50"></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td>$<?php echo number_format($row['price'], 2); ?></td>
                <td>
                    <button onclick="window.location.href='edit_product.php?id=<?php echo $row['id']; ?>'">Edit</button>
                    <button onclick="window.location.href='manage_products.php?delete=<?php echo $row['id']; ?>'">Delete</button>
                </td>
            </tr>
            <?php
                endwhile;
            else:
            ?>
            <tr>
                <td colspan="6">No products found in the database.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
