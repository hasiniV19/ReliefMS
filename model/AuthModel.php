<?php

namespace app\model;

use app\core\DBModel;

class AuthModel extends DBModel
{
    private $user_id;

    public function getTableName()
    {
        return "authentication";
    }

    public function getCols()
    {
        return ["password", "user_id"];
    }

    public function getValues()
    {
        return [$this->user_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}