<?php

namespace app\model;

use app\core\DBModel;

class VolunteerApplicationModel extends DBModel
{
    private $name;
    private $address;
    private $age;
    private $gender;
    private $occupation;
    private $available_day;
    private $have_vehicle;
    private $status;
    private $mobile;


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