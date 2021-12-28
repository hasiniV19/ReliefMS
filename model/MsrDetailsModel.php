<?php

namespace app\model;

use app\core\DBModel;

class MsrDetailsModel extends DBModel
{

    private $msr_id;

    public function getTableName()
    {
        return "msrecipients";
    }

    public function getCols()
    {
        return ["address", "num_quarant_residents", "is_there_students", "no_students", "mobile", "name", "gs_division", "msr_id"];
    }

    public function getValues()
    {
        return [$this->msr_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}