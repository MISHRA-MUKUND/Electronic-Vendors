
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
    <a href="customer_dashboard.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="order.php">Orders</a>
        <a href="buy.php">Buy Product</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
        <div class="content">
            <!-- there we start adding table using php -->
            <?php include "connection.php";?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>LoginCredentials</th>
                    <th>CreditCard</th>
                    <th colspan="2">Actions</th>
                </tr>
            <!-- main php query -->
            <?php 
            session_start();
            $user=$_SESSION['user'];
                $query="select * from Customers natural join OnlineCustomers where CustomerID='$user'";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['Address']?></td>
                    <td><?php echo $row['Email']?></td>
                    <td><?php echo $row['LoginCredentials']?></td>
                    <td><?php echo $row['CreditCard']?></td>
                    <td><button id="update"><a href="updateuser.php?userID=<?php echo $row['CustomerID']; ?>">update</a></button></td>
                    <td><button id="delete"><a onclick="return confirm('are you sure you want to delete this Customer.')" href="deleteuser.php?userID=<?php echo $row['CustomerID']; ?>">delete</a></button></td>
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
