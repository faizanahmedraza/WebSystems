<?php
$name = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

$conn = mysqli_connect('localhost','root','','userdata');
if(!$conn){
    die('Connection Failed');
}
$query = "INSERT INTO login(username,email,password) VALUES('$name','$email','$pass')";
$run = mysqli_query($conn,$query);
if($run){
    echo "Records  inserted Successfully!";
}
else {
    echo "No records inserted!";
}