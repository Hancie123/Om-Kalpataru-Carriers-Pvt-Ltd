<?php
$servername="localhost";
$username="root";
$password="";
$database="transport";

$conn=new mysqli($servername, $username, $password, $database );

if(!$conn){
    die ("connection fail" .mysqli_error());
}




?>