<?php

namespace app\model;

use app\core\DBModel;

class VolunteerDetails extends DBModel
{
    private $volunteer_id;

    public function getTableName()
    {
        return "volunteers";
    }

    public function getCols()
    {
        return ['name', 'address', 'age', 'gender', 'occupation', 'available_day', 'have_vehicle', 'status', 'mobile', 'volunteer_id'];
    }

    public function getValues()
    {
        return [$this->volunteer_id];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }
}