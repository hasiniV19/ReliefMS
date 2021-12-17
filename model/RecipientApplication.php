<?php

namespace app\model;

use app\core\DBModel;

class RecipientApplication extends DBModel{

    public $recipient_type;
    public $status;

    public function getTableName()
    {
        return "recipients";
    }

    public function getCols()
    {
        return ['recipient_type', 'status'];
    }

    public function getValues()
    {
        return [$this->recipient_type, 'pending'];
    }

    public function setAttributes($data){
        foreach ($data as $key=>$value) {
            $this->{$key}= $value;
        }
    }

    public function getUserID()
    {
//        if ($conn->query($sql) === TRUE) {
//            $last_id = $conn->insert_id;
//            echo "New record created successfully. Last inserted ID is: " . $last_id;
//        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//        }
    }
}
