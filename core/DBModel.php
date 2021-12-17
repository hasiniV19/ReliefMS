<?php


namespace app\core;


use app\core\database\Database;

abstract class DBModel
{
    protected Database $connection;
    public function __construct(){
        $this->connection = Database::getInstance();
    }

    public function save()
    {
        $table = $this->getTableName();
        $cols = $this->getCols();
        $values = $this->getValues();
        $attributes = [];
        foreach ($cols as $colName){
            array_push($attributes, "?");
        }
        $sql = "INSERT INTO $table (".implode(",", $cols).") VALUES(".implode(",",$attributes).")";

        try {
            $this->connection->insert($sql, $values);
        } catch (\mysqli_sql_exception $error){
            return false;
        }
        return true;
    }

//    public function getLastID()
//    {
//        if ($connection->query($sql) === TRUE) {
//            $last_id = $connection->insert_id;
//            echo "New record created successfully. Last inserted ID is: " . $last_id;
//        } else {
//            echo "Error: " . $sql . "<br>" . $connection->error;
//        }
//    }

    abstract public function getTableName();

    abstract public function getCols();
    abstract public function getValues();

}