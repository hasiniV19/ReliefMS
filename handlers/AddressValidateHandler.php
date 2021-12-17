<?php

namespace app\handlers;

class AddressValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "address"){
            if(empty($validateRequest->getValue())){
                $this->validError = "Address is required.";
                $this->isValid = false;

            }else{
                $address = $validateRequest->getValue();
                $address = filter_var($address, FILTER_SANITIZE_STRING);
                if(!preg_match('/[A-Za-z0-9\-\\,.]+/', $address)){
                    $this->validError = "*Invalid address";
                    $this->isValid = false;
                } else {
                    $this->isValid = true;
                }
                $validateRequest->setValue($address);
            }
            return true;
        }

        return false;
    }
}