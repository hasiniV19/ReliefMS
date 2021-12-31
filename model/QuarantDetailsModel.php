<?php

namespace app\model;

class QuarantDetailsModel extends \app\core\DBModel
{

    private $msr_id;

    public function getTableName()
    {
        return "quarant_residents";
    }

    public function getCols()
    {
        return ["msr_id"];
    }

    public function getValues()
    {
        return [$this->msr_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}