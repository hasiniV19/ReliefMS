<?php

namespace app\controller;

use mysqli;

class DBConController{
    private $_connection;
    private $_host;
    private $_password;
    private $_username;
    private $_database;

    private static $_instance;

    private function __construct(){
        $this->_connection = new mysqli($this->_host, $this->_password, $this->_username, $this->_database);

        /* Test if connection succeeded */
        if (mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() . " (" .
                mysqli_connect_errno() . ")"
            );
        }
    }

    /*
      Get instance of the database
     */
    public static function getInstance()
    {
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection()
    {
        return $this->_connection;
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
        $result = $this->_connection->prepare($sql);
        $types = $this->get_types($array);
        var_dump($types);
        $result->bind_param($types, ...$array);
        $result->execute();
    }

    public function get_record($sql, $type, $id)
    {

        $statement = $this->_connection->prepare($sql);
        $statement->bind_param($type, $id);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_assoc();
        return $data;

    }

    public function set_status($sql, $status, $id)
    {
        $statement = $this->_connection->prepare($sql);
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
        mysqli_close($this->_connection);
    }


}