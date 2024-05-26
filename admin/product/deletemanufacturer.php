<?php
include("connection.php");
$ManufacturerID=$_GET['ManufacturerID'];
$delete="DELETE FROM Manufacturer WHERE ManufacturerID='$ManufacturerID'";
$data=mysqli_query($con,$delete);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data deleted succesffully");
            window.open("manufacturer.php","_self");
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