<?php

namespace app\model;

class FsRecipientDeleteModel extends \app\core\DBModel
{
    private $fsr_id;

    public function getTableName()
    {
        return "fsrecipients";
    }

    public function getCols()
    {
        return ["fsr_id"];
    }

    public function getValues()
    {
        return [$this->fsr_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value){
            $this->{$key} = $value;
        }
    }
}