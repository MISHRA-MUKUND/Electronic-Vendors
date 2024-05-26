
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admindashboard.css">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="form.css">
    <style>
        .active{
            text-decoration : underline !important;
        }
        #update{
            background-color: green;
        }
        #delete{
            background-color: red;
        }
        #update a,#delete a{
            color: antiquewhite;
            text-decoration: none;
        }
        #add {
        background-color: green;
        cursor: pointer;
    }
     #add a{
        color: white !important;
        text-decoration: none !important;
        line-height:20px;
        cursor: pointer;
    }
    input[type="password"]{
    width: 80%;
    margin: 10px 0;
    padding: 10px;
    font-size: 18px;
}

    </style>
</head>
<body>
<div class="navbar">
    <a href="customer_dashboard.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="order.php">Orders</a>
        <a href="buy.php">Buy Product</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
        <!-- method to display old data as placeholder -->
       <?php
       include("connection.php");
       session_start();
       $user=$_SESSION['user'];
       $query="select * from Customers natural join OnlineCustomers where CustomerID='$user'";
        $data=mysqli_query($con,$query);
         $row=mysqli_fetch_array($data);
       ?>
        <div class="content">
            <center>
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['Name'] ?>"><br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $row['Address'] ?>"><br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $row['Email'] ?>"><br>
                <label for="LoginCredentials">Newpassword:</label>
                <input type="password" id="LoginCredentials" name="LoginCredentials" value="<?php echo $row['LoginCredentials'] ?>"><br>
                <input type="submit" value="Update" name="Update">
                <button id="button"><a href="profile.php">Cancel</a></button>
            </form>
            </center>
        </div>
       <?php
        include("connection.php");
        if(isset($_POST['Update'])){
        session_start();
        $user=$_SESSION['user'];
         $name=$_POST['name'];
         $address=$_POST['address'];
         $email=$_POST['email'];
         $LoginCredentials=$_POST['LoginCredentials'];
        $update="UPDATE Customers SET Name='$name',Address='$address',Email='$email' WHERE CustomerID='$user'";
        $data=mysqli_query($con,$update);
        $update1="UPDATE OnlineCustomers SET LoginCredentials='$LoginCredentials'WHERE CustomerID='$user'";
        $data1=mysqli_query($con,$update1);
        if($data1){
        ?>
        <script type="text/javascript">
            alert("data updated succesffully");
            window.open("profile.php","_self");
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
