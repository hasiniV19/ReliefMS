<?php

namespace app\model;

use app\core\DBModel;

class DonationDeleteModel extends DBModel
{
    private $donation_id;

    public function getTableName()
    {
        return "donation_requests";
    }

    public function getCols()
    {
        return ["donation_id"];
    }

    public function getValues()
    {
        return [$this->donation_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}