<?php

namespace app\model;

use app\core\DBModel;

class RecipientApplication extends DBModel{

    public $recipient_type;
    public $status;

    public function getTableName()
    {
        return "recipients";
    }

    public function getCols()
    {
        return ['recipient_type', 'status'];
    }

    public function getValues()
    {
        return [$this->recipient_type, 'pending'];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}
