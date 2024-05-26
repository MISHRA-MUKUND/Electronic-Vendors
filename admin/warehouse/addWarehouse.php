<!DOCTYPE html>
<html>
<head>
    <title>Add Warehouse</title>
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
        <form action="" method="post">
                <label for="WarehouseName">WarehouseName:</label>
                <input type="text" id="name" name="WarehouseName" required><br>
                <input type="submit" value="Submit" name="Submit">
                <button id="button"><a href="location.php">Cancel</a></button>
            </form>
    </div>
    <?php
     include("connection.php");
      if(isset($_POST['Submit'])){
       $WarehouseName=$_POST['WarehouseName'];
    
    // inserting into Warehouse
    $insert="INSERT INTO Warehouses(Location)
    VALUES ('$WarehouseName')";
     $data1=mysqli_query($con,$insert);
     if($data1){
        ?>
        <script type="text/javascript">
            alert("Warehouse added succesffully");
            window.open("location.php","_self");
        </script>
        <?php
     }
     else{
        ?>
        <script type="text/javascript"> 
        alert("Warehouse already found");
        window.open("Warehouse.php","_self");
       </script>
        <?php
     }
      }
     ?>
    <div class="footer">
        <p>Copyright © Mukund</p>
    </div>
</body>
</html>
