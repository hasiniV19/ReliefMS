<?php

namespace app\handlers;

class AgeValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "age"){
            if(empty($validateRequest->getValue())){
                $validateRequest->setValidError("Enter your age");
                $validateRequest->setIsValid(false);

            }else{
                $age = $validateRequest->getValue();
                if(!filter_var($age, FILTER_VALIDATE_INT)){
                    $validateRequest->setValidError("*Only numbers allowed");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($age);
            }
            return true;
        }
        return false;
    }
}