<?php

namespace app\model;
use app\core\DBModel;

class RaiseFundApplication extends DBModel
{
    private $reciept_name;
    private $amount;

    public function getTableName()
    {
        return "money_donation_requests";
    }

    public function getCols()
    {
        return ["donation_id","reciept_name", "amount"];
    }

    public function getValues()
    {
        return [1,$this->reciept_name, $this->amount];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }


}