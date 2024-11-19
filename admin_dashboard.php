<?php
session_start();

// Check if the user is logged in and has admin role
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();  // Stop further execution
}
?>

<!doctype html>
<html>
<head>
    <title>Admin Page</title>
    <!-- Include your styles here -->
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <div class="navbar">
        <a href="index.html">Home</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Use the options below to manage the website:</p>
        <div class="admin-options">
			<button onclick="window.location.href='manage_products.php'">Manage Products</button>
        </div>
    </div>
</body>
</html>
