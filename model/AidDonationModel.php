<?php

namespace app\model;

use app\core\DBModel;

class AidDonationModel extends DBModel
{
    private $donation_id;
    private $recipient_id;
    private $collecting_method;
    private $station;

    public function getTableName()
    {
        return "aid_donation_requests";
    }

    public function getCols()
    {
        return ["donation_id", "recipient_id", "collecting_method", "station"];
    }

    public function getValues()
    {
        return [$this->donation_id, $this->recipient_id, $this->collecting_method, $this->station];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}