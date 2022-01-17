<?php

namespace app\model;

use app\core\DBModel;

class RecipientUpdateModel extends DBModel
{
    private $status;
    private $recipient_id;
    private $table;

    public function getTableName()
    {
        return $this->table;
    }

    public function getCols()
    {
        return ["status", "recipient_id"];
    }

    public function getValues()
    {
        return [$this->status, $this->recipient_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}