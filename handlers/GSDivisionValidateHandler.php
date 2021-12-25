<?php

namespace app\handlers;

class GSDivisionValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        $str = $validateRequest->getKey();
        if($str === "gs_division"){

                $val = $validateRequest->getValue();
                $val = filter_var($val, FILTER_SANITIZE_STRING);
                if(!preg_match("/[A-Za-z0-9\-\\.]+/", $val)) {
                    $validateRequest->setValidError("*Invalid");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($val);

            return true;
        }

        return false;
    }
}