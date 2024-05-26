<?php
session_start();

?>
<!DOCTYPE html> 
<html>
<head>
    <title>admin dashboard</title>
    <link rel="stylesheet" href="admindashboard.css">
</head>
<body>
    <div class="navbar">
    <a href="customer_dashboard.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="order.php">Orders</a>
        <a href="buy.php">Buy Product</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <?php
    include("connection.php");
    $user=$_SESSION['user'];
    $sql="select * from `customers` where CustomerID='$user'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $Name=$row['Name'];
    ?>
    <div class="main">
        <div class="sidebar">
            <h2>Notice Section</h2>
            <!-- Add your notices or important links here -->
        </div>
        <div class="content">
            <center>
            <h1 class="greeting">Welcome Mr. <?php echo $Name?> <br>in <br>Radhe Radhe</h1>
            <!-- Add your content here -->
         </center>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
