<?php

namespace app\model;

use app\core\DBModel;

class DonationModel extends DBModel
{
    private $donor_id;
    private $donation_type;

    public function getTableName()
    {
        return "donation_requests";
    }

    public function getCols()
    {
        return ["donor_id", "donation_type", "status"];
    }

    public function getValues()
    {
        return [$this->donor_id, $this->donation_type, "pending"];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }


}