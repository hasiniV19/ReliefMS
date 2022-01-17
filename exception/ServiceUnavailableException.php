<?php

namespace app\exception;

class ServiceUnavailableException extends \Exception
{
    public function __construct()
    {
        parent::__construct("OOPS &#128533; The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.", 503);
    }
}