<?php

namespace app\handlers;

class OccupationValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "occupation"){
            if(empty($validateRequest->getValue())){
                $validateRequest->setValidError("*Enter your occupation");
                $validateRequest->setIsValid(false);

            }else{
                $occupation = $validateRequest->getValue();
                $occupation = filter_var($occupation, FILTER_SANITIZE_STRING);
                if(!preg_match("/^[a-zA-Z-' ]*$/", $occupation)){
                    $validateRequest->setValidError("*Invalid occupation");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($occupation);
            }
            return true;
        }

        return false;
    }
}