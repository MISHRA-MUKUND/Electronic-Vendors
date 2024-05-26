<?php
include("connection.php");
session_start();
$user=$_SESSION['user'];
$delete="DELETE FROM Customers WHERE CustomerID='$user'";
$data=mysqli_query($con,$delete);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data deleted succesffully");
            window.open("../index.php","_self");
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

?>