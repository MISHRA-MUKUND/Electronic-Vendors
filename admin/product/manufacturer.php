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
        #update{
            background-color: green;
        }
        #delete{
            background-color: red;
        }
        #update a,#delete a{
            color: antiquewhite;
            text-decoration: none;
        }
        #add {
        background-color: green;
        cursor: pointer;
    }
     #add a{
        color: white !important;
        text-decoration: none !important;
        line-height:20px;
        cursor: pointer;
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
    <div class="sidebar">
            <h1 style="display: block; text-align: center;">product</h1>
            <a href="productview.php">view</a>
            <a href="addproduct.php">Add Product</a>
            <a href="update_delete_product.php">Update/Delete Product details</a>
            <a href="manufacturer.php" class="active">Add/Delete Manufacturer</a>
    </div>
        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>ManufacturerID</th>
                    <th>ManufacturerName</th>
                    <th colspan="2">Actions</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from Manufacturer";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['ManufacturerID']?></td>
                    <td><?php echo $row['ManufacturerName']?></td>
                    <td><button id="update"><a href="updatemanufacturer.php?ManufacturerID=<?php echo $row['ManufacturerID']; ?>">update</a></button></td>
                    <td><button id="delete"><a onclick="return confirm('are you sure you want to delete this manufacturer.')" href="deletemanufacturer.php?ManufacturerID=<?php echo $row['ManufacturerID']; ?>">delete</a></button></td>
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
            <br><br>
            <center>
            <button id="add"><a href="addmanufacturer.php">add manufacturer</a></button>
           </center>  
    </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
