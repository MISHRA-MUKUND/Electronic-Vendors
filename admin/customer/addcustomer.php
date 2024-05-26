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
            <h1 style="display: block; text-align: center;">Customer</h1>
            <a href="customerview.php">View</a>
            <a href="addcustomer.php" class="active">Add Customer</a>
            <a href="update_delete_view.php">Update/Delete Customer</a>
        </div>
        <div class="content">
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address"><br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email"><br>
                <input type="submit" value="Submit" name="Submit">
                <button id="button"><a href="customer.php">Cancel</a></button>
            </form>
        </div>
    </div>
    <!-- here is the code to insert data in to database -->
     <?php
     include("connection.php");
      if(isset($_POST['Submit'])){
       $name=$_POST['name'];
       $address=$_POST['address'];
       $email=$_POST['email'];
       $query="select * from Customers where CustomerID = (select max(CustomerId) from Customers);";
       $data=mysqli_query($con,$query);
    
       $row=mysqli_fetch_array($data);
       $id=$row['CustomerID'] +1;
    // inserting into customers
    $query1="INSERT INTO Customers (CustomerID,Name, Address, Email)
    VALUES ('$id','$name', '$address','$email')";
     $data1=mysqli_query($con,$query1);
    // inserting into customers
    $query2="INSERT INTO OnlineCustomers (CustomerID, LoginCredentials)
    VALUES ('$id', 'root123');";
      $data2=mysqli_query($con,$query2);
     if($data2){
        ?>
        <script type="text/javascript">
            alert("data saved succesffully");
            window.open("customerview.php","_self");
        </script>
        <?php
     }
     else{
        ?>
        <script type="text/javascript"> 
        alert("data already found");
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
