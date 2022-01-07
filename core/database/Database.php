<?php

namespace app\core\database;


use app\exception\ServiceUnavailableException;
use mysqli;


class Database implements GenericDB
{
    private $mysqli;

    private $_host;
    private $_username;
    private $_password;
    private $_database;
    private static $_instance;

    public $conn = null;


    private function __construct()
    {
        $this->set_db_attributes();
        $this->conn = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if ($this->conn->connect_error) {
            throw new ServiceUnavailableException();
        }
    }

    public static function getInstance():GenericDB
    {
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __clone()
    {
        trigger_error('Clone is not allowed.',E_USER_ERROR);
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
        if ($result === false){
            throw new ServiceUnavailableException();
        }
        $types = $this->get_types($array);
        if ($result->bind_param($types, ...$array) === false){
            throw new ServiceUnavailableException();
        }
        if ($result->execute() === false){
            throw new ServiceUnavailableException();
        }
        return $this->conn->insert_id;
    }

    public function get_record($sql, $data)
    {
        $statement = $this->conn->prepare($sql);
        if ($statement === false){
            throw new ServiceUnavailableException();
        }
        $types = $this->get_types($data);
        if ($statement->bind_param($types,... $data) === false){
            throw new ServiceUnavailableException();
        }
        if ($statement->execute() === false){
            throw new ServiceUnavailableException();
        }
        $result = $statement->get_result();
        $data = $result->fetch_assoc();
        return $data;

    }

    public function get_records($sql, $data)
    {
        $statement = $this->conn->prepare($sql);
        if ($statement === false){
            throw new ServiceUnavailableException();
        }
        $types = $this->get_types($data);
        if ($statement->bind_param($types,... $data) === false){
            throw new ServiceUnavailableException();
        }
        if ($statement->execute() === false) {
            throw new ServiceUnavailableException();
        }
        $result = $statement->get_result();
        $data =[];
        //var_dump($data);
        while ($row = $result->fetch_assoc()){
            //var_dump($row);
            $data[] = $row;
        }
        //var_dump($data);
        return $data;
    }

    public function get_all($query)
    {
        $statement = $this->conn->prepare($query);
        if ($statement === false){
            throw new ServiceUnavailableException();
        }
        if ($statement->execute() === false){
            throw new ServiceUnavailableException();
        }
        $result = $statement->get_result();
        $data =[];
        //var_dump($data);
        while ($row = $result->fetch_assoc()){
            //var_dump($row);
            $data[] = $row;
        }
        //var_dump($data);
        return $data;
    }

    public function set_status($sql, $status, $id)
    {
        $statement = $this->conn->prepare($sql);
        if ($statement === false){
            throw new ServiceUnavailableException();
        }
        if ($statement->bind_param('si', $status, $id) === false){
            throw new ServiceUnavailableException();
        }
        if ($statement->execute() === false){
            throw new ServiceUnavailableException();
        }
    }

    public function update($query, $data)
    {
        $result = $this->conn->prepare($query);
        if ($result === false){
            throw new ServiceUnavailableException();
        }
        $types = $this->get_types($data);
        if ($result->bind_param($types, ...$data) === false){
            throw new ServiceUnavailableException();
        }
        if ($result->execute() === false){
            throw new ServiceUnavailableException();
        }
    }

    public function delete($query, $data)
    {
        $result = $this->conn->prepare($query);
        if ($result === false){
            throw new ServiceUnavailableException();
        }
        $types = $this->get_types($data);
        if ($result->bind_param($types, ...$data) === false){
            throw new ServiceUnavailableException();
        }
        if ($result->execute()){
            throw new ServiceUnavailableException();
        }
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