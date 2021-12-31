<?php

namespace app\model;

use app\core\DBModel;

class FsrDetailsModel extends DBModel
{
    private $fsr_id;
    private $recipient_id;

    public function getTableName()
    {
        return "fsrecipients";
    }

    public function getCols()
    {
        return ["name", "no_members", "monthly_income", "gms_certificate", "address", "mobile", "is_there_students", "no_students", "fsr_id", "recipient_id"];
    }

    public function getValues()
    {
        return [$this->recipient_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}