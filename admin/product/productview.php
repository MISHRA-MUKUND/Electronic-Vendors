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
        <a href="product.php">Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
    <div class="main">
            <div class="sidebar">
            <h1 style="display: block; text-align: center;">product</h1>
            <a href="productview.php" class="active">view</a>
            <a href="addproduct.php">Add Product</a>
            <a href="update_delete_product.php">Update/Delete Product details</a>
            <a href="manufacturer.php">Add/Delete Manufacturer</a>
        </div>

        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>ProductID</th>
                    <th>Name</th>
                    <th>ManufacturerId</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from products";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['ProductID']?></td>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['ManufacturerID']?></td>
                    <td><?php echo $row['Description']?></td>
                    <td><?php echo $row['Price']?></td>
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
