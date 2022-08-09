<?php 
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "royal";

$connection = mysqli_connect($server,$username,$password,$database);
if($connection){
    //  echo "Connection Successful";
}else{
    echo "no response";
}


?>