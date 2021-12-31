<?php

namespace app\model;

use app\core\DBModel;

class VolunteerUpdateModel extends DBModel
{

    private $status;
    private $volunteer_id;

    public function getTableName()
    {
        return "volunteers";
    }

    public function getCols()
    {
        return ["status", "volunteer_id"];
    }

    public function getValues()
    {
        return [$this->status, $this->volunteer_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}