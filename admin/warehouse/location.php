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
        <a href="../product/product.php">Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
    <div class="sidebar">
            <h1 style="display: block; text-align: center;">Warehouse</h1>
            <a href="location.php" class="active">Warehouse</a>
            <a href="warehouseinventory.php">Warehouse Inventory</a>
            <a href="reorder.php">Reorder</a>
            <a href="updatereorder.php">Update Reorder</a>
        </div>
        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>WarehouseID</th>
                    <th>WarehouseName</th>
                    <th colspan="2">Actions</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from Warehouses";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['WarehouseID']?></td>
                    <td><?php echo $row['Location']?></td>
                    <td><button id="update"><a href="updateWarehouse.php?WarehouseID=<?php echo $row['WarehouseID']; ?>">update</a></button></td>
                    <td><button id="delete"><a onclick="return confirm('are you sure you want to delete this Warehouse.')" href="deleteWarehouse.php?WarehouseID=<?php echo $row['WarehouseID']; ?>">delete</a></button></td>
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
            <button id="add"><a href="addWarehouse.php">add Warehouse</a></button>
           </center>  
    </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
