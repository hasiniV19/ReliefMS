<?php

namespace app\model;

use app\core\DBModel;

class RecipientsStatusModel extends DBModel
{
    private $status;
    private $table;

    public function getTableName()
    {
        return $this->table;
    }

    public function getCols()
    {
        return ["status"];
    }

    public function getValues()
    {
        return [$this->status];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }


}