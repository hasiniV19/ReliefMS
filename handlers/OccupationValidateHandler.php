<?php

namespace app\handlers;

class OccupationValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "occupation"){
            if(empty($validateRequest->getValue())){
                $this->validError = "*Enter your occupation";
                $this->isValid = false;

            }else{
                $occupation = $validateRequest->getValue();
                $occupation = filter_var($occupation, FILTER_SANITIZE_STRING);
                if(!preg_match("/^[a-zA-Z-' ]*$/", $occupation)){
                    $this->validError = "*Invalid occupation";
                    $this->isValid = false;
                } else {
                    $this->isValid = true;
                }
                $validateRequest->setValue($occupation);
            }
            return true;
        }

        return false;
    }
}