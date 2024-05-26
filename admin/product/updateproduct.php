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
        <a href="product.php" >Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
    <div class="sidebar">
            <h1 style="display: block; text-align: center;">product</h1>
            <a href="productview.php" >view</a>
            <a href="addproduct.php">Add Product</a>
            <a href="update_delete_product.php" class="active">Update/Delete Product details</a>
            <a href="manufacturer.php">Add/Delete Manufacturer</a>
    </div>
        <!-- method to display old data as placeholder -->
       <?php
       include("connection.php");
        $ProductID=$_GET['ProductID'];
         $query="select * from products where ProductID ='$ProductID'";
        $data=mysqli_query($con,$query);
         $row=mysqli_fetch_array($data);
       ?>
        <div class="content">
            <form action="" method="post">
                <label for="Name">Name</label>
                <input type="text" id="Name" name="Name" value="<?php echo $row['Name'] ?>"><br>
                <label for="ManufacturerID">ManufacturerID:</label>
                <input type="text" id="ManufactureID" name="ManufacturerID" value="<?php echo $row['ManufacturerID'] ?>"><br>
                <label for="Description">Description</label>
                <input type="text" id="Description" name="Description" value="<?php echo $row['Description'] ?>"><br>
                <label for="Price">Price</label>
                <input type="number" id="Price" name="Price" value="<?php echo $row['Price'] ?>"><br>
                <input type="submit" value="Update" name="Update">
                <button id="button"><a href="update_delete_product.php">Cancel</a></button>
            </form>
        </div>
       <?php
        include("connection.php");
        if(isset($_POST['Update'])){
         $Name=$_POST['Name'];
         $ManufacturerID=$_POST['ManufacturerID'];
         $Description=$_POST['Description'];
         $Price=$_POST['Price'];
        $update="UPDATE Products SET Name='$Name',ManufacturerID='$ManufacturerID',
        Description='$Description',Price='$Price' WHERE ProductID='$ProductID'";
        $data=mysqli_query($con,$update);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data updated succesffully");
            window.open("update_delete_product.php","_self");
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
