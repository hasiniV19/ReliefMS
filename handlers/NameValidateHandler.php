<?php

namespace app\handlers;

class NameValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "name"){
            if(empty($validateRequest->getValue())){
                $validateRequest->setValidError("*Full name is required.");
                $validateRequest->setIsValid(false);
            }else{
                $name = $validateRequest->getValue();
                $name = filter_var($name, FILTER_SANITIZE_STRING);
                if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                    $validateRequest->setValidError("*Only letters and white spaces allowed");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($name);
            }
            return true;
        }

        return false;
    }
}