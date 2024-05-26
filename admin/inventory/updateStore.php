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
        <a href="inventory.php">Inventory</a>
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
       <?php
       include("connection.php");
        $StoreID=$_GET['StoreID'];
         $query="select * from Stores where StoreID ='$StoreID'";
        $data=mysqli_query($con,$query);
         $row=mysqli_fetch_array($data);
       ?>
        <div class="content">
            <form action="" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $row['Location'] ?>"><br>
                <input type="submit" value="Update" name="Update">
                <button id="button"><a href="stores.php">Cancel</a></button>
            </form>
        </div>
       <?php
        include("connection.php");
        if(isset($_POST['Update'])){
         $name=$_POST['name'];
        $update="UPDATE Stores SET Location='$name' WHERE StoreID='$StoreID'";
        $data=mysqli_query($con,$update);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data updated succesffully");
            window.open("stores.php","_self");
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
