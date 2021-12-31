<?php

namespace app\model;

use app\core\DBModel;

class MoneyDonationDetailsModel extends DBModel
{
    private $donation_id;

    public function getTableName()
    {
        return "money_donation_requests";
    }

    public function getCols()
    {
        return ["receipt_name", "amount", "m_donation_id", "donation_id"];
    }

    public function getValues()
    {
        return [$this->donation_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}