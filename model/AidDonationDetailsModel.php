<?php

namespace app\model;

use app\core\DBModel;

class AidDonationDetailsModel extends DBModel
{
    private $donation_id;

    public function getTableName()
    {
        return "aid_donation_requests";
    }

    public function getCols()
    {
        return ["collecting_method","station","recipient_id","a_donation_id", "donation_id"];
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