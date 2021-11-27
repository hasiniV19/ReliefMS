<?php

namespace app\model;

use app\core\DBModel;

class VolunteerApplication extends DBModel
{

    public $name;
    public $address;
    public $age;
    public $gender;
    public $occupation;
    public $available_day;
    public $have_vehicle;
    public $status;
    public $mobile;


    public function getTableName()
    {
        return "volunteers";
    }

    public function getCols()
    {
        return ['name', 'address', 'age', 'gender', 'occupation', 'available_day', 'have_vehicle', 'status', 'mobile'];
    }

    public function getValues()
    {
        return [$this->name, $this->address, $this->age, $this->gender, $this->occupation, $this->available_day, $this->have_vehicle, 'pending', $this->mobile];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}