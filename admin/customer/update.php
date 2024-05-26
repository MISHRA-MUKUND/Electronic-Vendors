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
         <a href="customer.php">Customer</a>
        <a href="../product/product.php">Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
        <div class="sidebar">
            <h1 style="display: block; text-align: center;">customer</h1>
            <a href="customerview.php">View</a>
            <a href="addcustomer.php" >Add Customer</a>
            <a href="update_delete_view.php" class="active">Update/Delete Customer</a>
        </div>
        <!-- method to display old data as placeholder -->
       <?php
       include("connection.php");
        $CustomerID=$_GET['CustomerID'];
         $query="select * from Customers where CustomerID ='$CustomerID'";
        $data=mysqli_query($con,$query);
         $row=mysqli_fetch_array($data);
       ?>
        <div class="content">
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['Name'] ?>"><br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $row['Address'] ?>"><br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $row['Email'] ?>"><br>
                <input type="submit" value="Update" name="Update">
                <button id="button"><a href="update_delete_view.php">Cancel</a></button>
            </form>
        </div>
       <?php
        include("connection.php");
        if(isset($_POST['Update'])){
         $name=$_POST['name'];
         $address=$_POST['address'];
         $email=$_POST['email'];
        $update="UPDATE Customers SET Name=' $name',Address=' $address',Email=' $email' WHERE CustomerID='$CustomerID'";
        $data=mysqli_query($con,$update);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data updated succesffully");
            window.open("update_delete_view.php","_self");
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
