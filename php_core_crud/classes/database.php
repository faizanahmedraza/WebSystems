<?php
    class Database {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "crud_core_php";

        //Connnection
        protected function connect(){
            $conn = new mysqli($this->host,$this->username,$this->password,$this->dbname);
            if($conn->connect_errno){
                echo "Connection Failed: (".$conn->connect_errno.") ".$conn->connect_error;
            }
            return $conn;
        }
    }
?>