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
    input[type="number"],select{
    width: 80%;
    margin: 10px 0;
    padding: 10px;
    font-size: 18px;
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
            <a href="stores.php">Stores</a>
            <a href="viewinventory.php">View Inventory</a>
            <a href="addinventory.php" class="active">Create Inventory</a>
            <a href="sales.php">Sales</a>
        </div>

        <div class="content">
        <form action="" method="post">
        <label for="product">products:</label>
        <select id="product" name="product">
            <option value="null">select</option>
        <?php
         include("connection.php");
         $query="select * from  products";
         $data=mysqli_query($con,$query);
         $result=mysqli_num_rows($data);
         if($result){
         while($row=mysqli_fetch_array($data)){
          ?>
            <option value="<?php echo $row['ProductID']?>"><?php echo $row['Name']?></option>
         <?php
         }
         }
         ?>
        </select><br>
        <label for="store">stores:</label>
        <select id="store" name="store">
            <option value="null">select</option>
        <?php
         include("connection.php");
         $query="select * from  stores";
         $data=mysqli_query($con,$query);
         $result=mysqli_num_rows($data);
         if($result){
         while($row=mysqli_fetch_array($data)){
          ?>
            <option value="<?php echo $row['StoreID']?>"><?php echo $row['Location']?></option>
         <?php
         }
         }
         ?>
        </select><br>
        <label for="Quantity">Quantity:</label>
        <input type="number" id="Quantity" name="Quantity" step="1" min="0" required><br>
        <input type="submit" value="Submit" name="Submit">
         <button id="button"><a href="inventory.php">Cancel</a></button>
    </form>
        </div>
    </div>
    <!-- here is the code to insert data in to database -->
     <?php
     include("connection.php");
      if(isset($_POST['Submit'])){
       $StoreID=$_POST['store'];
       $ProductID=$_POST['product'];
       $Quantity=$_POST['Quantity'];
    
    // inserting into products
    $insert="INSERT INTO Inventory (ProductID,StoreID,Quantity)
    VALUES ('$ProductID','$StoreID', '$Quantity')";
     $data1=mysqli_query($con,$insert);
     if($data1){
        ?>
        <script type="text/javascript">
            alert("inventory added succesffully");
            window.open("viewinventory.php","_self");
        </script>
        <?php
     }
     else{
        ?>
        <script type="text/javascript"> 
        alert(" already found");
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
