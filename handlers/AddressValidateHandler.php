<?php

namespace app\handlers;

class AddressValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "address"){
            if(empty($validateRequest->getValue())){
                $validateRequest->setValidError("*Address is required.");
                $validateRequest->setIsValid(false);

            }else{
                $address = $validateRequest->getValue();
                $address = filter_var($address, FILTER_SANITIZE_STRING);
                if(!preg_match('/[A-Za-z0-9\-\\,.]+/', $address)){
                    $validateRequest->setValidError("*Invalid address");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($address);
            }
            return true;
        }

        return false;
    }
}