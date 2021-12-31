<?php

namespace app\model;

use app\core\DBModel;

class DonorModel extends DBModel
{
    private $user_id;

    public function getTableName()
    {
        return "donors";
    }

    public function getCols()
    {
        return ["user_id"];
    }

    public function getValues()
    {
        return [$this->user_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}