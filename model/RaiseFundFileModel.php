<?php

namespace app\model;
use app\core\DBModel;

class RaiseFundFileModel extends DBModel
{
    private $reciept_name;
    private $m_donation_id;

    public function getTableName()
    {
        return "money_donation_requests";
    }

    public function getCols()
    {
        return ["reciept_name", "m_donation_id"];
    }

    public function getValues()
    {
        return [$this->reciept_name, $this->m_donation_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}