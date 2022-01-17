<?php

namespace app\model;

use app\core\DBModel;

class DonationUpdateModel extends DBModel
{
    private $status;
    private $donation_id;

    public function getTableName()
    {
        return "donation_requests";
    }

    public function getCols()
    {
        return ["status", "donation_id"];
    }

    public function getValues()
    {
        return [$this->status, $this->donation_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }

}