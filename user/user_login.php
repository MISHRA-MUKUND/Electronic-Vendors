<?php
 session_start();
//this will be used in admin dashboard so that no one can enter without id
$_SESSION['user']=$_POST['custId'];
include("connection.php");
//if(isset($_POST['submit']));
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $name=$_POST['custId'];
    $password=$_POST['pwd'];
    $sql="select * from `OnlineCustomers` where CustomerID='$name' and LoginCredentials='$password'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    if($row){
        header("location: customer_dashboard.php");
    }
    else{
        $message= "invalid credentials";
        $_SESSION['user_message']=$message;
        header("location:../index.php");
    }
}
?>