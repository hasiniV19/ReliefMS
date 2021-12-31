<?php

namespace app\model;
use app\core\DBModel;

class RaiseFundApplication extends DBModel
{
    private $amount;
    private $donation_id;

    public function getTableName()
    {
        return "money_donation_requests";
    }

    public function getCols()
    {
        return ["donation_id","amount"];
    }

    public function getValues()
    {
        return [$this->donation_id, $this->amount];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }


}