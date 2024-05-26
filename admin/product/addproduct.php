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
        <a href="product.php">Product</a>
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="../warehouse/warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
            <div class="sidebar">
            <h1 style="display: block; text-align: center;">product</h1>
            <a href="productview.php">view</a>
            <a href="addproduct.php" class="active">Add Product</a>
            <a href="update_delete_product.php">Update/Delete Product details</a>
            <a href="manufacturer.php">Add/Delete Manufacturer</a>
        </div>

        <div class="content">
        <form action="" method="post">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" ></input><br>
        <label for="manufacturer">Manufacturer:</label>
        <select id="manufacturer" name="manufacturer">
            <option value="null">select</option>
        <?php
         include("connection.php");
         $query="select * from  manufacturer";
         $data=mysqli_query($con,$query);
         $result=mysqli_num_rows($data);
         if($result){
         while($row=mysqli_fetch_array($data)){
          ?>
            <option value="<?php echo $row['ManufacturerID']?>"><?php echo $row['ManufacturerName']?></option>
         <?php
         }
         }
         ?>
        </select><br>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="1" min="0" required><br>
        <input type="submit" value="Submit" name="Submit">
         <button id="button"><a href="productview.php">Cancel</a></button>
    </form>
        </div>
    </div>
    <!-- here is the code to insert data in to database -->
     <?php
     include("connection.php");
      if(isset($_POST['Submit'])){
       $Name=$_POST['name'];
       $Description=$_POST['description'];
       $ManufacturerID=$_POST['manufacturer'];
       $Price=$_POST['price'];
    
    // inserting into products
    $insert="INSERT INTO Products (Name,Description,ManufacturerID,Price)
    VALUES ('$Name', '$Description','$ManufacturerID','$Price')";
     $data1=mysqli_query($con,$insert);
     if($data1){
        ?>
        <script type="text/javascript">
            alert("product added succesffully");
        </script>
        <?php
     }
     else{
        ?>
        <script type="text/javascript"> 
        alert("product already found");
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
