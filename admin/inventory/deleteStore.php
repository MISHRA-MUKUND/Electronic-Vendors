<?php
include("connection.php");
$StoreID=$_GET['StoreID'];
$delete="DELETE FROM Stores WHERE StoreID='$StoreID'";
$data=mysqli_query($con,$delete);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data deleted succesffully");
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

?>