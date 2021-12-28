<?php

namespace app\model;

use app\core\DBModel;

class OtherNeedDetailsModel extends DBModel
{
    private $recipient_id;

    public function getTableName()
    {
        return "other_needs";
    }

    public function getCols()
    {
        return ["need", "recipient_id"];
    }

    public function getValues()
    {
        return [$this->recipient_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}