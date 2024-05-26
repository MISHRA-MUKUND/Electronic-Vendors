<?php
include("connection.php");
$CustomerID=$_GET['CustomerID'];
$delete="DELETE FROM Customers WHERE CustomerID='$CustomerID'";
$data=mysqli_query($con,$delete);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data deleted succesffully");
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

?>