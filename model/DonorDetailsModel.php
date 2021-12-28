<?php

namespace app\model;

use app\core\DBModel;

class DonorDetailsModel extends DBModel
{
    private $donor_id;

    public function getTableName()
    {
        return "donors";
    }

    public function getCols()
    {
        return ['name', 'address', 'age', 'mobile', 'district','donor_id'];
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