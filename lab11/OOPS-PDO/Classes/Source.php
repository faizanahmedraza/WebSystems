<?php
class Source extends db {
    public $QUERY;

    public function Query($query,$param = []){
        if(empty($param)){
            // If we don't have the parameter
            $this->QUERY = $this->conn->prepare($query);
            return $this->QUERY->execute();
        } else {
            // If we have some parameters
            $this->QUERY = $this->conn->prepare($query);
           /* Execute a prepared statement by passing an array of insert values */
            return $this->QUERY->execute($param);
        }
    }

    public function CountRows(){
        return $this->QUERY->rowCount();
    }
    // Fetch all records from specific table
    public function FetchAll()
    {
        return $this->QUERY->fetchAll(PDO::FETCH_OBJ);
    }
    // Fetch single row from specific table
    public function SingleRow(){
        return $this->QUERY->fetch(PDO::FETCH_OBJ);
    }
}
