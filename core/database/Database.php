<?php

namespace app\core\database;


use mysqli;


class Database
{
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "jimin13jk1";
    private $_database = "epsilon";

    public $conn = null;


    function __construct()
    {
//        $this->_host = DB_HOST;
//        $this->_username = DB_USER;
//        $this->_password = DB_PASSWORD;
//        $this->_database = DB_NAME;

        $this->conn = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if ($this->conn->connect_error) {
            echo "Fail" . $this->conn->connect_error;
        }

    }

    // can define predefined function to insert,update
    public function insert($sql, $array)
    {
        $result = $this->conn->prepare($sql);
        $types = $this->get_types($array);
        var_dump($types);
        $result->bind_param($types, ...$array);
        $result->execute();
    }

    public function get_record($sql, $type, $id)
    {

        $statement = $this->conn->prepare($sql);
        $statement->bind_param($type, $id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_assoc();
        return $data;

    }

    public function set_status($sql, $status, $id)
    {
        $statement = $this->conn->prepare($sql);
        var_dump($statement);
        $statement->bind_param('si', $status, $id);
        $statement->execute();
    }

    // get types of element in an array
    private function get_types($array)
    {
        $types = "";
        foreach ($array as $element) {
            if (is_string($element)) {
                $types .= 's';
            } else if (is_int($element)) {
                $types .= 'i';
            }
        }
        return $types;
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}