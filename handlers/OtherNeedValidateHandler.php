<?php

namespace app\handlers;

class OtherNeedValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        $str = $validateRequest->getKey();
        if( substr($str, 0,4)=== "need"){

            $val = $validateRequest->getValue();
            if (empty($val))
                return true;
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