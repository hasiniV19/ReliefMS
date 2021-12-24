<?php

namespace app\handlers;

class FinalValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        return true;
    }
}