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
    <a href="customer.php">Customer</a>
        <a href="../product/product.php">Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
        <div class="sidebar">
            <h1 style="display: block; text-align: center;">customer</h1>
            <a href="customerview.php" class="active">View</a>
            <a href="addcustomer.php">Add Customer</a>
            <a href="update_delete_view.php">Update/Delete Customer</a>
        </div>
        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>CustomerID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from customers";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['CustomerID']?></td>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['Address']?></td>
                    <td><?php echo $row['Email']?></td>
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
