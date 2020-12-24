<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";
//dsn = data source name  --  Connecting to MySQL databases
try {
    $conn = new PDO("mysql:host=$servername; port=3306; dbname=$dbname; charset=utf8mb4",$username,$password);  //charset and port may you use or not its ok
    $sql = "INSERT INTO student(name,password) VALUES('Faizan Ahmed Raza','12345678'),('Hur Abbas','12345678'),('Syed Ali','12345678') ";
    // $sql .= "INSERT INTO login(user_name,user_password) VALUES('Faizan Ahmed Raza','12345678'),('Faizan Ahmed Raza','12345678'),('Faizan Ahmed Raza','12345678') ";
    $conn->query($sql);
    echo "Records have been successfully Inserted into the DATABASE!!";
} catch(PDOException $e) {
    //object operator -> , is used in object to access methods and properties of an object
    echo "Error: ".$e->getMessage(); 
}

?>