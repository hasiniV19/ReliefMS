<?php

namespace app\model;

use app\core\DBModel;

class FsrFileModel extends DBModel
{
    private $gms_certificate;
    private $fsr_id;

    public function getTableName()
    {
        return "fsrecipients";
    }

    public function getCols()
    {
        return ["gms_certificate", "fsr_id"];
    }

    public function getValues()
    {
        return [$this->gms_certificate, $this->fsr_id];
    }

    public function setAttributes($data)
    {
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}