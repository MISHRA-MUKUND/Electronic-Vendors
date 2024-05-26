<!DOCTYPE html>
<html>
<head>
    <title>customer</title>
    <link rel="stylesheet" href="admindashboard.css">
     <link rel="stylesheet" href="customer.css">
     <link rel="stylesheet" href="form.css">
     <style>
     .active{
            text-decoration : underline !important;
        }
        #button a{
        color: white !important;
        text-decoration: none !important;
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
        <!-- method to display old data as placeholder -->
       <?php
       include("connection.php");
        $WarehouseID=$_GET['WarehouseID'];
         $query="select * from Warehouses where WarehouseID ='$WarehouseID'";
        $data=mysqli_query($con,$query);
         $row=mysqli_fetch_array($data);
       ?>
        <div class="content">
            <form action="" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $row['Location'] ?>"><br>
                <input type="submit" value="Update" name="Update">
                <button id="button"><a href="location.php">Cancel</a></button>
            </form>
        </div>
       <?php
        include("connection.php");
        if(isset($_POST['Update'])){
         $name=$_POST['name'];
        $update="UPDATE Warehouses SET Location='$name' WHERE WarehouseID='$WarehouseID'";
        $data=mysqli_query($con,$update);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data updated succesffully");
            window.open("location.php","_self");
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
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
