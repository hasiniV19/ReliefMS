<?php

namespace app\exception;

class ServiceUnavailableException extends \Exception
{
    public function __construct()
    {
        parent::__construct("serviceUnavailable", 503);
    }
}