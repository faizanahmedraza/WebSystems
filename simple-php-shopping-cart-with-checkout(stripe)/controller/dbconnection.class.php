<?php
    class DbConnection {
        private $db_host = 'localhost';
        private $db_user = 'root';
        private $db_password = '';
        private $db_name = 'add_to_cart';
        private $db_port = '3306';
        private $db_socket = '';
        protected $conn;
  
        public function __construct(){
            $this->conn = $this->connectDb();
            if($this->conn->connect_errno){
                echo "Failed to connect to MySQL: " . $this->conn->connect_error;
                exit();
            }
        }
        /**
         * Function is used to make connection with mysql database
         * @return object $mysqli
         */
        private function connectDb(){
            $mysqli_conn = mysqli_connect($this->db_host,$this->db_user,$this->db_password,$this->db_name,$this->db_port,$this->db_socket);
            return $mysqli_conn;
        }
    }
?>