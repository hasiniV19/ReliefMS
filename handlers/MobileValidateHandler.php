<?php

namespace app\handlers;

class MobileValidateHandler extends ValidateHandler
{
    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "mobile"){
            if(empty($validateRequest->getValue())){
                $validateRequest->setValidError("Contact number is required");
                $validateRequest->setIsValid(false);
            }else{
                $contact_number = $validateRequest->getValue();
                $contact_number = filter_var($contact_number, FILTER_SANITIZE_STRING);
                if(!preg_match("/(0)?[0-9]{9}/", $contact_number)) {
                    $validateRequest->setValidError("Invalid contact number");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($contact_number);
            }
            return true;
        }

        return false;
    }

}