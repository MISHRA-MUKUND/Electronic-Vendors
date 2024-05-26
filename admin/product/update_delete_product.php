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
    </style>
</head>
<body>
   
    <div class="main">
            <div class="sidebar">
            <h1 style="display: block; text-align: center;">product</h1>
            <a href="productview.php">view</a>
            <a href="addproduct.php">Add Product</a>
            <a href="update_delete_product.php" class="active">Update/Delete Product details</a>
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
                    <th colspan="2">action</th>
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
                    <td><button id="update"><a href="updateproduct.php?ProductID=<?php echo $row['ProductID']; ?>">update</a></button></td>
                    <td><button id="delete"><a onclick="return confirm('are you sure you want to delete this product.')" href="deleteproduct.php?ProductID=<?php echo $row['ProductID']; ?>">delete</a></button></td>
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
