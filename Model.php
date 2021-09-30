<?php
include_once(__DIR__ . '/config/database.php');

class PhpModel {
    private $database;

    function __construct(){
        $this->database = new Database();
    }

    function returnAllRecored($data){

        $query = "Write your SQL Query HERE";
        $result = $this->runQuery($query);

        if($result->num_rows > 0){
            return $result->rows;
        } else {
            return false;
        }
    }

    function returnFirstRecored(){

        $query = "Write your SQL Query HERE";
        $result = $this->runQuery($query);

        if($result->num_rows > 0){
            return $result->row;
        } else {
            return false;
        }
    }

    function returnNumberOfRecord(){

        $query = "Write your SQL Query HERE";
        $result = $this->runQuery($query);
        return $result->num_rows;
    }



    // --------- Code for Run Query

    function runQuery($query){
        $query = mysqli_query($this->database->conn, $query);
        if (!$this->database->conn->errno) {
            if ($query instanceof \mysqli_result) {
                $data = array();
        
                while ($row = $query->fetch_assoc()) {
                    $data[] = $row;
                }
        
                $result = new \stdClass();
                $result->num_rows = $query->num_rows;
                $result->row = isset($data[0]) ? $data[0] : array();
                $result->rows = $data;
        
                $query->close();
        
                return $result;
            } else {
                return true;
            }
        } else {
            throw new \Exception('Error: ' . $this->database->conn->error . '<br />Error No: ' . $this->database->conn->errno . '<br />' . $query);
        }
    }

    public function escape($value) {
        return $this->database->conn->real_escape_string($value);
    }

    public function countAffected() {
        return $this->database->conn->affected_rows;
    }

    public function getLastId() {
        return $this->database->conn->insert_id;
    }

    public function showErrors(){
        return mysqli_error($this->database->conn);
    }

    public function __destruct() {
        $this->database->conn->close();
    }
}

?>