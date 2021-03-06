<?php


namespace app\core;


use app\core\database\Database;
use app\core\database\GenericDB;

abstract class DBModel
{
    protected GenericDB $connection; // Database should be GenericDB
    protected $lastId;
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
            $this->lastId = $this->connection->insert($sql, $values);
        } catch (\mysqli_sql_exception $error){
            return false;
        }
        return true;
    }

    public function retrieve()
    {
        $table = $this->getTableName();
        $cols = $this->getCols();
        $numCols = count($cols);
        $values = $this->getValues();

        $query = "SELECT * FROM $table WHERE ".$cols[$numCols-1]. "=?";

//        foreach ($cols as $key=>$value) {
//            if($key === $numCols-1){
//                break;
//            }
//            $query .= $value;
//            if($key !== $numCols -2){
//                $query .= ",";
//            }
//        }
//        $query .= " WHERE ".$cols[$numCols-1]. "=?";
//        $query .= " FROM $table WHERE ".$cols[$numCols-1]. "=?";

        try {
            return $this->connection->get_record($query,$values);
        } catch (\mysqli_sql_exception $error){
            return false;
        }


    }

    public function retrieve_records()
    {
        $table = $this->getTableName();
        $cols = $this->getCols();
        $numCols = count($cols);
        $values = $this->getValues();

        $query = "SELECT * FROM $table WHERE ".$cols[$numCols-1]. "=?";

//        foreach ($cols as $key=>$value) {
//            if($key === $numCols-1){
//                break;
//            }
//            $query .= $value;
//            if($key !== $numCols -2){
//                $query .= ",";
//            }
//        }
//        $query .= " WHERE ".$cols[$numCols-1]. "=?";
//        $query .= " FROM $table WHERE ".$cols[$numCols-1]. "=?";

        try {
            return $this->connection->get_records($query,$values);
        } catch (\mysqli_sql_exception $error){
            return false;
        }


    }

    public function retrieve_all()
    {
        $table = $this->getTableName();

        $query = "SELECT * FROM $table";


        try {
            return $this->connection->get_all($query);
        } catch (\mysqli_sql_exception $error){
            return false;
        }

    }

    public function update()
    {
        $table = $this->getTableName();
        $cols = $this->getCols();
        $numCols = count($cols);
        $values = $this->getValues();
        $attributes = [];
        $query = "UPDATE $table SET ";
        foreach ($cols as $key=>$value) {
            if($key === $numCols-1){
                break;
            }
            $query .= $value . "= ?";
            if($key !== $numCols -2){
                $query .= ",";
            }
        }

        $query .= " WHERE ".$cols[$numCols-1]. "=?";

        try {
            $this->connection->update($query, $values);
        } catch (\mysqli_sql_exception $error){
            return false;
        }
        return true;

    }

    public function delete()
    {
        $table = $this->getTableName();
        $cols = $this->getCols();
        $values = $this->getValues();
        $sql = "DELETE FROM $table WHERE $cols[0] =?";

        try {
            $this->connection->delete($sql, $values);
        } catch (\mysqli_sql_exception $error){
            return false;
        }
        return true;

    }
    public function getLastID()
    {
        return $this->lastId;
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