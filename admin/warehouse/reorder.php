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
            <a href="location.php">Warehouse</a>
            <a href="warehouseinventory.php">Warehouse Inventory</a>
            <a href="reorder.php"class="active">Reorder</a>
            <a href="updatereorder.php">Update Reorder</a>
        </div>
        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>ReorderID</th>
                    <th>ProductID</th> 
                    <th>Quantity</th>
                    <th>OrderDate</th>
                    <th>ArrivalDate</th>
                    <th>Status</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from Reorders";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['ReorderID']?></td>
                    <td><?php echo $row['ProductID']?></td>
                    <td><?php echo $row['Quantity']?></td>
                    <td><?php echo $row['OrderDate']?></td>
                    <td><?php echo $row['ArrivalDate']?></td>
                    <td><?php echo $row['Status']?></td>
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
            <center>
            <button id="add"><a href="newreorder.php">Create Reorder</a></button>
           </center> 
        </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
