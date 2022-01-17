<?php

namespace app\core\database;

interface GenericDB
{
    public function insert($sql, $array);
    public function get_record($sql, $data);
    public function set_status($sql, $status, $id);
    public function get_records($sql, $data);
    public function get_all($query);
    public function update($query, $data);
    public function delete($query, $data);
}