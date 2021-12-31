<?php

namespace app\model;

use app\core\DBModel;

class MsrDetailsModel extends DBModel
{

    private $msr_id;
    private $recipient_id;

    public function getTableName()
    {
        return "msrecipients";
    }

    public function getCols()
    {
        return ["msr_id","address", "num_quarant_residents", "is_there_students", "no_students", "mobile", "name", "gs_division", "recipient_id"];
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