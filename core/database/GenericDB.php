<?php

namespace app\core\database;

interface GenericDB
{
    public function insert($sql, $array);
    public function get_record($sql, $type, $id);
    public function set_status($sql, $status, $id);
}