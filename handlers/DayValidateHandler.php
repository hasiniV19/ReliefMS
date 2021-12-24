<?php

namespace app\handlers;

class DayValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "available_day"){
            if(empty($validateRequest->getValue())){
                var_dump("Hi");
                $validateRequest->setValidError("*Invalid day selection");
                $validateRequest->setIsValid(false);
            }else{
                $available_day = $validateRequest->getValue();
                $validateRequest->setValue($available_day);
            }
            return true;
        }

        return false;
    }
}