<?php

namespace app\model;

class UserModel extends \app\core\DBModel
{
    private $email;

    public function getTableName()
    {
        return "users";
    }

    public function getCols()
    {
        return ["user_id", "type", "email", "email"];
    }

    public function getValues()
    {
        return [$this->email];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}