<?php
    include_once 'database.php';
    class Controller extends Database {
        //GET all records
        public function getAll($table){
            $sql = "SELECT * from $table";
            $stmt = $this->connect()->query($sql);
            if($stmt->num_rows > 0){
                while($row = $stmt->fetch_assoc()){
                    $arr[] = $row;
                }
                return $arr;
            } else {
                return "No Records Found!";
            }
        }

        //GET records with given condition
        public function getAllStmt($table,$field_arr,$where_condition_arr = '',$order_by = '',$limit = '',$offset = ''){
            if($field_arr != ''){
                foreach($field_arr as $key){
                    $field_values[] = $key;
                }
            }
            $field = implode(",",$field_values);
            $sql = "SELECT $field FROM $table ";
            if($where_condition_arr != null){
                $sql .= "WHERE ";
                $c = count($where_condition_arr);
                $where_condition = 1;
                foreach($where_condition_arr as $key=>$val){
                    if($where_condition == $c){
                        $sql .= "$key = '$val' ";
                    } else {
                        $sql .= "$key = '$val' AND ";
                    }
                    $where_condition++;
                }
            }
            if($order_by != ''){
                $sql .= "ORDER BY $order_by ASC ";
            }
            if($limit != ''){
                $sql .= "LIMIT $limit ";
            }
            if($offset != ''){
                $sql .= "OFFSET $offset ";
            }
            $stmt = $this->connect()->query($sql);
            if($stmt->num_rows > 0){
                while($row = $stmt->fetch_assoc()){
                    $arr[] = $row;
                }
                return $arr;
            } else {
                return "No Records Found!";
            }
        }

        // GET records using wildcard
        public function getWildCardRecord($table, $where_by,$where_by_value,$wild_card){
            $sql = "SELECT * FROM $table WHERE $where_by LIKE ";
            if($wild_card == '_'){
                $sql .= "'_$where_by_value'";
            } else if($wild_card == '[]'){
                $sql .= "'[$where_by_value]%'";
            } else {
                $sql .= "'%$where_by_value%'";
            }
            $stmt = $this->connect()->query($sql);
            if($stmt->num_rows > 0){
                while($row = $stmt->fetch_assoc()){
                    $arr = $row;
                }
                return $arr;
            } else {
                return "No Records Found!";
            }
        }

        // INSERT records in database
        public function insertRecord($table,$submit_arr){
            if($submit_arr != ''){
                foreach($submit_arr as $key=>$val){
                    $field_values[] = $key;
                    $arg_values[] = $val;
                }
                $field = implode(",",$field_values);
                $arg = implode("','",$arg_values);
                $arg = "'".$arg."'";
                $sql = "INSERT INTO $table($field) values($arg)";
                $stmt = $this->connect()->query($sql);
            }     
        }

        // UPDATE records with given condition
        public function updateRecord($table,$submit_arr,$where_field,$where_value){
            if($submit_arr != ''){
                $sql = "UPDATE $table SET ";
                $c = count($submit_arr);
                $where_condition = 1;
                foreach($submit_arr as $key=>$val){
                   if($where_condition == $c){
                       $sql .= "$key = '$val'";
                   } else {
                       $sql .= "$key = '$val', ";
                   }
                   $where_condition++;
                }
                $sql .= " WHERE $where_field = '$where_value' ";
                $stmt = $this->connect()->query($sql);
            }     
        }

        // DELETE records from database
        public function deleteRecord($table,$id,$email = ''){
                $sql = "DELETE FROM $table WHERE id = $id OR email = '$email'";   
                $stmt = $this->connect()->query($sql);
        }

        public function getSafeStr(string $escapestr) : string{
            if($escapestr != ''){
                return $this->connect()->real_escape_string($escapestr);
            }
        }

    }
?>