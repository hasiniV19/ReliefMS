<?php

namespace app\model;

use app\core\DBModel;

class OtherNeedModel extends DBModel
{
    private $recipient_id;
    private $need;

    public function getTableName()
    {
        return "other_needs";
    }

    public function getCols()
    {
        return ['recipient_id', 'need'];
    }

    public function getValues()
    {
        return [$this->recipient_id, $this->need];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}