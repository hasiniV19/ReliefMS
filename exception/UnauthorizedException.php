<?php

namespace app\exception;

use Throwable;

class UnauthorizedException extends \Exception
{

    public function __construct()
    {
        parent::__construct("Not Authorized", 401);
    }
}