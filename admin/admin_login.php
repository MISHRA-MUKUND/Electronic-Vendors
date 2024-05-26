<?php
 session_start();
//this will be used in admin dashboard so that no one can enter without id
$_SESSION['user']=$_POST['adminId'];
include("connection.php");
//if(isset($_POST['submit']));
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $name=$_POST['adminId'];
    $password=$_POST['pwd'];
    $sql="select * from `admin` where name='$name' and password='$password'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    if($row){
        header("location: admin_dashboard.php");
    }
    else{
        $message= "invalid credentials";
        $_SESSION['admin_message']=$message;
        header("location:../index.php");
    }
}
?>