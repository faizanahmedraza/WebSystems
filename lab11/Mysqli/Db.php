<?php
$server_name = "localhost";
$user_name = "root";
$user_pass = "";
$db_name = "payrollmanagementsystem";
//Create Connection
$conn = mysqli_connect($server_name,$user_name,$user_pass,$db_name);
//Check Connection
if(mysqli_connect_errno()) {
    die("Connection Failed: ".mysqli_connect_error());
}
