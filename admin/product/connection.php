<?php
$host="localhost";
$user="root";
$password="";
$db="project3";
$con=mysqli_connect($host,$user,$password,$db,3307);
if($con===false){
    die("connection error");
}
?>