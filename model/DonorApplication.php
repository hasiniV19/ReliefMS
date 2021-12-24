<?php

namespace app\model;

use app\core\DBModel;

class DonorApplication extends DBModel
{
    private $user_id;
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
        return ['user_id', 'name', 'mobile', 'address', 'age', 'district'];
    }

    public function getValues()
    {
        return [5, $this->name, $this->mobile, $this->address, $this->age, $this->district];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}