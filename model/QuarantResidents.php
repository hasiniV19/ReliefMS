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
        return ["name", "msr_id", "age", "gender", "covid_status"];
    }

    public function getValues()
    {
        return [$this->name, $this->msr_id, $this->age, $this->gender, $this->covid_status];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}