<?php

namespace app\model;

use app\core\DBModel;

class RecipientDeleteModel extends DBModel
{
    private $recipient_id;

    public function getTableName()
    {
        return "recipients";
    }

    public function getCols()
    {
        return ["recipient_id"];
    }

    public function getValues()
    {
        return [$this->recipient_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}