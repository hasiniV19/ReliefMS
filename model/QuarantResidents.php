<?php

namespace app\model;
use app\core\DBModel;

class QuarantResidents extends DBModel
{
    private $name;
    private $msr_id;
    private $age;
    private $gender;
    private $covid_status;

    public function getTableName()
    {
        return "quarant_residents";
    }

    public function getCols()
    {
        return ["name", "age", "gender", "covid_status", "msr_id"];
    }

    public function getValues()
    {
        return [$this->name, $this->age, $this->gender, $this->covid_status, $this->msr_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}