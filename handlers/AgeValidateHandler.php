<?php

namespace app\handlers;

class AgeValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "age"){
            if(empty($validateRequest->getValue())){
                $this->validError = "Enter your age";
                $this->isValid = false;

            }else{
                $age = $validateRequest->getValue();
                if(!filter_var($age, FILTER_VALIDATE_INT)){
                    $this->validError = "*Only numbers allowed";
                    $this->isValid = false;
                } else {
                    $this->isValid = true;
                }
                $validateRequest->setValue($age);
            }
            return true;
        }
        return false;
    }
}