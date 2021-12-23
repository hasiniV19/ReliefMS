<?php

namespace app\handlers;

class OtherNeedsValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        $str = $validateRequest->getKey();
        if( substr($str, 0,4)=== "need"){

                $need = $validateRequest->getValue();
                $need = filter_var($need, FILTER_SANITIZE_STRING);
                if(!preg_match("/[A-Za-z0-9\-\\.]+/", $need)) {
                    $validateRequest->setValidError("Invalid need");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($need);

            return true;
        }

        return false;
    }
}