<?php
include("connection.php");
$WarehouseID=$_GET['WarehouseID'];
$delete="DELETE FROM Warehouses WHERE WarehouseID='$WarehouseID'";
$data=mysqli_query($con,$delete);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data deleted succesffully");
            window.open("location.php","_self");
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