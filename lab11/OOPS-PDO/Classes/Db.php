<?php
class Db {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "payrollmanagementsystem";
    protected $conn;

    public function __construct(){
        try{
            /*
                Create Database Connnection
            */
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,
                $this->username, $this->password);
            } catch(PDOException $e){
            echo "Connection Problem: ".$e->getMessage();
        }
    }
}
?>