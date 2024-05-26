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
        <a href="inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
            <div class="sidebar">
            <h1 style="display: block; text-align: center;">Inventory</h1>
            <a href="stores.php" class="active">Stores</a>
            <a href="viewinventory.php">View Inventory</a>
            <a href="addinventory.php">Create Inventory</a>
            <a href="sales.php">Sales</a>
        </div>
        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>StoreID</th>
                    <th>StoreName</th>
                    <th colspan="2">Actions</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from Stores";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['StoreID']?></td>
                    <td><?php echo $row['Location']?></td>
                    <td><button id="update"><a href="updateStore.php?StoreID=<?php echo $row['StoreID']; ?>">update</a></button></td>
                    <td><button id="delete"><a onclick="return confirm('are you sure you want to delete this Store.')" href="deleteStore.php?StoreID=<?php echo $row['StoreID']; ?>">delete</a></button></td>
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
            <button id="add"><a href="addStore.php">add Store</a></button>
           </center>  
    </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
