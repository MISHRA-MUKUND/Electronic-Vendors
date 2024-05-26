
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admindashboard.css">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="table.css">
  
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
                    <th>ProductName</th>
                    <th>SaleDate</th>
                    <th>PomisedDeliveryDate</th>
                    <th>ShipmetDate</th>
                    <th>TrackingNumber</th>
                    <th>Quantity</th>
                    <th>TotalPrice</th>
                </tr>
            <!-- main php query -->
            <?php 
                  session_start();
                  $user=$_SESSION['user'];
                $query="select * from sales natural join products natural join shipments where CustomerID='$user'";
                $data=mysqli_query($con,$query);
                $result=mysqli_num_rows($data);
                if($result){
                 while($row=mysqli_fetch_array($data)){
                 ?>
                 <tr>
                    <td><?php echo $row['Name']?></td>
                    <td><?php echo $row['SaleDate']?></td>
                    <td><?php echo $row['PromisedDeliveryDate']?></td>
                    <td><?php echo $row['ShipmentDate']?></td>
                    <td><?php echo $row['TrackingNumber']?></td>
                    <td><?php echo $row['Quantity']?></td>
                    <td><?php echo $row['TotalPrice']?></td>
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
