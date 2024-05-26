<?php
include("connection.php");
$ProductID=$_GET['ProductID'];
$delete="DELETE FROM Products WHERE ProductID='$ProductID'";
$data=mysqli_query($con,$delete);
        if($data){
        ?>
        <script type="text/javascript">
            alert("data deleted succesffully");
            window.open("update_delete_product.php","_self");
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