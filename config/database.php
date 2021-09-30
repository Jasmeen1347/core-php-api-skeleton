<?php
/**
 *  file used for connecting to the database.
 */

class Database {


    //Db credentials
    private $host = 'localhost';
    private $db_name = 'DBNAME';
    private $username = 'root';
    private $password = '';

    public $conn;

    //Db connection
    /**
     * @return mixed
     */
    function __construct()
    {
        $this->conn = null;

        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }

}
