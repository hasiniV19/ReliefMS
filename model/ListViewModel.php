<?php

namespace app\model;

use app\core\DBModel;

class ListViewModel extends DBModel
{
    private $tableName;

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getCols()
    {
        return;
    }

    public function getValues()
    {
        return;
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}