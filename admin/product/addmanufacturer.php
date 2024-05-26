<!DOCTYPE html>
<html>
<head>
    <title>Add manufacturer</title>
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
        <a href="product.php">Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
    <div class="sidebar">
            <h1 style="display: block; text-align: center;">product</h1>
            <a href="productview.php">view</a>
            <a href="addproduct.php">Add Product</a>
            <a href="update_delete_product.php">Update/Delete Product details</a>
            <a href="manufacturer.php" class="active">Add/Delete Manufacturer</a>
    </div>
        <!-- method to display old data as placeholder -->
        <form action="" method="post">
                <label for="ManufacturerName">ManufacturerName:</label>
                <input type="text" id="name" name="ManufacturerName" required><br>
                <input type="submit" value="Submit" name="Submit">
                <button id="button"><a href="manufacturer.php">Cancel</a></button>
            </form>
    </div>
    <?php
     include("connection.php");
      if(isset($_POST['Submit'])){
       $ManufacturerName=$_POST['ManufacturerName'];
    
    // inserting into manufacturer
    $insert="INSERT INTO Manufacturer(ManufacturerName)
    VALUES ('$ManufacturerName')";
     $data1=mysqli_query($con,$insert);
     if($data1){
        ?>
        <script type="text/javascript">
            alert("Manufacturer added succesffully");
            window.open("manufacturer.php",_self);
        </script>
        <?php
     }
     else{
        ?>
        <script type="text/javascript"> 
        alert("Manufacturer already found");
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
