<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location : index.php");
}
?>
<!DOCTYPE html> 
<html>
<head>
    <title>admin dashboard</title>
    <link rel="stylesheet" href="admindashboard.css">
</head>
<body>
    <div class="navbar">
        <a href="customer/customer.php">Customer</a>
        <a href="product/product.php">Product</a>
        <a href="inventory/inventory.php">Inventory</a>
        <a href="warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
        <div class="sidebar">
            <h2>Notice Section</h2>
            <!-- Add your notices or important links here -->
        </div>
        <div class="content">
            <center>
            <h1 class="greeting">Radhe Radhe Admin</h1>
            <!-- Add your content here -->
         </center>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
