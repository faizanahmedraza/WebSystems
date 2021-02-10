<?php
    require_once 'dbconnection.class.php';
    class DbController extends DbConnection {

        /**
         * Function is used to run query
         * @param string $query
         * @return array $resultArr
         */

        public function runQuery($query){
            $runStmt = mysqli_query($this->conn,$query);
            while($row = mysqli_fetch_assoc($runStmt)){
                $resultArr[] = $row;
            }
            if(!empty($resultArr)){
                return $resultArr;
            }
        }

        /**
         * Function is used to get num of rows
         * @param string $query
         * @return array $rowsCount
         */

        public function rowsCount($query){
            $runStmt = mysqli_query($this->conn,$query);
            $rowsCount = mysqli_num_rows($runStmt);
            return $rowsCount;
        }
    }
?>