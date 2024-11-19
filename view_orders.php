<?php
require 'db_connection.php';

$sql = "SELECT * FROM orders ORDER BY orderDate DESC";
$result = $conn->query($sql);
?>
<!doctype html>
<html>
<head>
    <title>View Orders</title>
</head>
<body>
    <h1>Orders</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Coffee Type</th>
                <th>Quantity</th>
                <th>Customer Name</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['coffeeType']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['customerName']; ?></td>
                <td><?php echo $row['orderDate']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
$conn->close();
?>
