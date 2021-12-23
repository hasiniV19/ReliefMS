<?php

namespace app\model;
use app\core\DBModel;

class msrApplication extends DBModel
{
    private $recipient_id;
    private $address;
    private $num_quarant_residents;
    private $is_there_students;
    private $no_students;
    private $mobile;
    private $name;
    private $gs_division;

    public function getTableName()
    {
        return "msrecipients";
    }

    public function getCols()
    {
        return ['recipient_id', 'address', 'num_quarant_residents', 'is_there_students', 'no_students', 'mobile', 'name', 'gs_division'];
    }

    public function getValues()
    {
        return [$this->recipient_id, $this->address, $this->num_quarant_residents, $this->is_there_students, $this->no_students, $this->mobile, $this->name, $this->gs_division];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}