<?php

namespace app\model;

use app\core\DBModel;

class MoneyDonationDeleteModel extends DBModel
{
    private $m_donation_id;

    public function getTableName()
    {
        return "money_donation_requests";
    }

    public function getCols()
    {
        return ["m_donation_id"];
    }

    public function getValues()
    {
        return [$this->m_donation_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}