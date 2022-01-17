<?php

namespace app\exception;

class NotFoundException extends \Exception
{

    public function __construct()
    {
        parent::__construct("OOPS. Looks like the page you're looking for no longer exists", 404);
    }
}