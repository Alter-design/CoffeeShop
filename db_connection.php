<?php
// Database configuration
$host = "localhost";  // Database host
$username = "root";   // Database username
$password = "";       // Database password
$database = "coffeeshop"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
// echo "Connected successfully";
?>
