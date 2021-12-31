<?php

namespace app\view;
class DateConverter
{
    public static function convertdate($date_from_db)
    {
        $timestamp = strtotime($date_from_db);
        return date('d/m/Y', $timestamp);
    }

}