<?php
include("connection.php");
session_start();
$ProductID=$_GET['ProductID'];
$user=$_SESSION['user'];
$query="select * from Shipments where TrackingNumber = (select max(TrackingNumber) from Shipments);";
       $data=mysqli_query($con,$query);
       $row=mysqli_fetch_array($data);
       $TrackingNumber=$row['TrackingNumber'] +1;
$query1="select * from products where ProductID='$ProductID'";
$data1=mysqli_query($con,$query1);
$row1=mysqli_fetch_array($data1);
$TotalPrice=$row1['Price'];
$Quantity=1;
$ShipperID=1;
$query2="INSERT INTO sales (CustomerID,ProductID,Quantity,TotalPrice)
VALUES ('$user','$ProductID','$user','$TotalPrice');";
 $data2=mysqli_query($con,$query2);
 $query3="select * from sales where SaleID = (select max(SaleID) from sales);";
       $data3=mysqli_query($con,$query3);
       $row=mysqli_fetch_array($data3);
       $SaleID=$row['SaleID'];
       
$query4="INSERT INTO Shipments (SaleID,ShipperID,TrackingNumber,PromisedDeliveryDate)
VALUES ('$SaleID','$ShipperID','$TrackingNumber',DATE_ADD(CURDATE(), INTERVAL 1 MONTH));";
    $data4=mysqli_query($con,$query4);
    if($data4){
        ?>
        <script type="text/javascript">
            alert("product ordered succesffully");
            window.open("order.php","_self")
        </script>
        <?php
     }
     else{
        ?>
        <script type="text/javascript"> 
        alert("data already found");
       </script>
        <?php
     }
?>
