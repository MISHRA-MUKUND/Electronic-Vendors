<!DOCTYPE html>
<html>
<head>
    <title>Add Store</title>
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
    <a href="customer.php">Customer</a>
        <a href="../product/product.php">Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
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
        <!-- method to display old data as placeholder -->
        <form action="" method="post">
                <label for="StoreName">StoreName:</label>
                <input type="text" id="name" name="StoreName" required><br>
                <input type="submit" value="Submit" name="Submit">
                <button id="button"><a href="stores.php">Cancel</a></button>
            </form>
    </div>
    <?php
     include("connection.php");
      if(isset($_POST['Submit'])){
       $StoreName=$_POST['StoreName'];
    
    // inserting into Store
    $insert="INSERT INTO Stores(Location)
    VALUES ('$StoreName')";
     $data1=mysqli_query($con,$insert);
     if($data1){
        ?>
        <script type="text/javascript">
            alert("Store added succesffully");
            window.open("stores.php","_self");
        </script>
        <?php
     }
     else{
        ?>
        <script type="text/javascript"> 
        alert("Store already found");
        window.open("stores.php","_self");
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
