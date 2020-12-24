<?php
$conn = mysqli_connect('localhost','root','','userdata');
if(!$conn){
    die("Database Connection Failed!");
}