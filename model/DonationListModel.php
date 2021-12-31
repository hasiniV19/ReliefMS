<?php

namespace app\model;

use app\core\DBModel;

class DonationListModel extends DBModel
{

    private $donor_id;

    public function getTableName()
    {
        return "donation_requests";
    }

    public function getCols()
    {
        return ["donor_id"];
    }

    public function getValues()
    {
        return [$this->donor_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}