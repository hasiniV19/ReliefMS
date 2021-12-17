<?php

namespace app\core\database;


use mysqli;


class Database implements GenericDB
{
    private $mysqli;

    private $_host;
    private $_username;
    private $_password;
    private $_database;

    public $conn = null;


    function __construct()
    {
        $this->set_db_attributes();
        $this->conn = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if ($this->conn->connect_error) {
            echo "Fail" . $this->conn->connect_error;
        }

    }

    public function set_db_attributes(){
        $this->_host = 'localhost';
        $this->_username = $_ENV['DB_USER'];
        $this->_password = $_ENV['DB_PASSWORD'];
        $this->_database = $_ENV['DB_NAME'];
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