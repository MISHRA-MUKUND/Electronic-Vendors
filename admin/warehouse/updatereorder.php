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
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
    <div class="sidebar">
            <h1 style="display: block; text-align: center;">Warehouse</h1>
            <a href="location.php">Warehouse</a>
            <a href="warehouseinventory.php">Warehouse Inventory</a>
            <a href="reorder.php">Reorder</a>
            <a href="updatereorder.php" class="active">Update Reorder</a>
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
                    <th colspan="2">ArrivalDate</th>
                </tr>
            <!-- main php query -->
            <?php 
                $query="select * from Reorders where ArrivalDate is null";
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
                    <form action="" method="post">
                    <td><input type="date" name=date></td>
                    <td><button type="submit" name="Update" Value="<?php echo $row['ReorderID']?><">Update</button></td>
                    </form>
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
            <?php
               include("connection.php");
               if(isset($_POST['Update'])){
                $ReorderID=$_POST['Update'];
                $ArrivalDate=$_POST['date'];
                $Status="Arrived";
               $update="UPDATE reorders SET ArrivalDate='$ArrivalDate',Status='$Status' WHERE ReorderID='$ReorderID'";
               $data=mysqli_query($con,$update);
               if($data){
               ?>
               <script type="text/javascript">
                   alert("data updated succesffully");
                   window.open("reorder.php","_self");
               </script>
               <?php
            }
            else{
               ?>
               <script type="text/javascript"> 
               alert("please try later");
              </script>
               <?php
            }
             }
       
            ?>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
