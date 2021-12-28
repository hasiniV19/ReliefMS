<?php

namespace app\model;

use app\core\DBModel;

class UserCreateModel extends DBModel
{
    private $type;
    private $username;
    private $email;

    public function getTableName()
    {
        return "users";
    }

    public function getCols()
    {
        return ["type", "username", "email"];
    }

    public function getValues()
    {
        return [$this->type, $this->username, $this->email];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}