<?php

namespace app\exception;

use Throwable;

class Unauthorized extends \Exception
{

    public function __construct()
    {
        parent::__construct("Not Authorized", 401);
    }
}