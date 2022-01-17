<?php

namespace app\exception;

use Throwable;

class ForbiddenException extends \Exception
{

    public function __construct()
    {
        parent::__construct("You don't have permission to access / on this server", 403);
    }
}