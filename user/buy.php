
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admindashboard.css">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="form.css">
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
    input[type="password"]{
    width: 80%;
    margin: 10px 0;
    padding: 10px;
    font-size: 18px;
}

    </style>
</head>
<body>
<div class="navbar">
    <a href="customer_dashboard.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="order.php">Orders</a>
        <a href="buy.php">Buy Product</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
<body>

        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>ManufacturerName</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            <!-- main php query -->
            <?php 
                session_start();
                $user=$_SESSION['user'];
                $query="select * from inventory natural join products natural join manufacturer";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['Description']?></td>
                    <td><?php echo $row['ManufacturerName']?></td>
                    <td><?php echo $row['Price']?></td>
                    <td><button id="update"><a  onclick="return confirm('are you sure you want buy this product.')" href="purchase.php?ProductID=<?php echo $row['ProductID']; ?>">Buy</a></button></td>
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
    </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
