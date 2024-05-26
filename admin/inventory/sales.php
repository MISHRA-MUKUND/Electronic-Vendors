<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admindashboard.css">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="table.css">
    <style>
        .active{
            text-decoration : underline !important;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="../customer/customer.php">Customer</a>
        <a href="../product/product.php">Product</a>
        <a href="inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
            <div class="sidebar">
            <h1 style="display: block; text-align: center;">Inventory</h1>
            <a href="stores.php">Stores</a>
            <a href="viewinventory.php">View Inventory</a>
            <a href="addinventory.php">Create Inventory</a>
            <a href="sales.php" class="active">Sales</a>
        </div>

        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                   <th>SaleID</th>
                   <th>CustomerID</th>
                    <th>ProductID</th> 
                    <th>SaleDate</th> 
                    <th>Quantity</th>
                    <th>TotalPrice</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from Sales";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['SaleID']?></td>
                    <td><?php echo $row['CustomerID']?></td>
                    <td><?php echo $row['ProductID']?></td>
                    <td><?php echo $row['SaleDate']?></td>
                    <td><?php echo $row['Quantity']?></td>
                    <td><?php echo $row['TotalPrice']?></td>
                </tr>

                 <?php
                 }
                }
                else
            {
            ?> 

             <tr>
                <td>No record found</td>
             </tr>
             <?php

             }
           ?>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
