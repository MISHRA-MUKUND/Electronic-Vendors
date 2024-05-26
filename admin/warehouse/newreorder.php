<!DOCTYPE html>
<html>
<head>
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
        <a href="../inventory/inventory.php">Inventory</a>
        <a href="warehouse.php">Warehouse</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
    <div class="sidebar">
            <h1 style="display: block; text-align: center;">Warehouse</h1>
            <a href="location.php">Warehouse</a>
            <a href="warehouseinventory.php">Warehouse Inventory</a>
            <a href="reorder.php">Reorder</a>
            <a href="updatereorder.php" class="active">Update Reorder</a>
        </div>
        <div class="content">
        <form action="" method="post">
        <select id="ProductID" name="Product">
            <option value="null">select</option>
        <?php
         include("connection.php");
         $query="select * from  Products";
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
        
        <label for="Quantity">Quantity:</label>
        <input type="Quantity" id="Quantity" name="Quantity" step="1" min="0" required><br>
        <input type="submit" value="Submit" name="Submit">
         <button id="button"><a href="reorder.php">Cancel</a></button>
    </form>
        </div>
    </div>
    <!-- here is the code to insert data in to database -->
     <?php
     include("connection.php");
      if(isset($_POST['Submit'])){
       $Name=$_POST['Product'];
       $Quantity=$_POST['Quantity'];
    
    // inserting into reorder
    $insert="INSERT INTO Reorders (ProductID,Quantity)
    VALUES ($Name,$Quantity)";
     $data1=mysqli_query($con,$insert);
     if($data1){
        ?>
        <script type="text/javascript">
            alert("reorder created succesffully");
            window.open("reorder.php","_self");
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
