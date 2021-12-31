<?php

namespace app\model;
use app\core\DBModel;

class fsrApplication extends DBModel
{
    private $recipient_id;
    private $name;
    private $no_members;
    private $monthly_income;
//    private $gms_certificate;
    private $address;
    private $mobile;
    private $is_there_students;
    private $no_students;


    public function getTableName()
    {
        return "fsrecipients";
    }

    public function getCols()
    {
        return ['recipient_id','name', 'no_members', 'monthly_income', 'address', 'mobile', 'is_there_students', 'no_students', 'status'];
    }

    public function getValues()
    {
        return [$this->recipient_id, $this->name, $this->no_members, $this->monthly_income, $this->address, $this->mobile, $this->is_there_students, $this->no_students, 'pending'];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}