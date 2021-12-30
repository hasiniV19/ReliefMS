<?php

namespace app\model;

use app\core\DBModel;

class DonorProfileModel extends DBModel
{
    private $donor_id;
    private $name;
    private $mobile;
    private $address;
    private $age;
    private $district;

    public function getTableName()
    {
        return "donors";
    }

    public function getCols()
    {
        return ['name', 'mobile', 'address', 'age', 'district','donor_id'];
    }

    public function getValues()
    {
        return [$this->name, $this->mobile, $this->address, $this->age, $this->district,$this->donor_id];

    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}