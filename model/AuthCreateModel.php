<?php

namespace app\model;

use app\core\DBModel;

class AuthCreateModel extends DBModel
{
    private $user_id;
    private $password;

    public function getTableName()
    {
        return "authentication";
    }

    public function getCols()
    {
        return ["user_id", "password"];
    }

    public function getValues()
    {
        return [$this->user_id, $this->password];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}