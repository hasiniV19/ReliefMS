<?php

namespace app\handlers;

class NameValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "name"){
            if(empty($validateRequest->getValue())){
                $this->validError = "Full name is required.";
                $this->isValid = false;

            }else{
                $name = $validateRequest->getValue();
                $name = filter_var($name, FILTER_SANITIZE_STRING);
                if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                    $this->validError = "*Only letters and white spaces allowed";
                    $this->isValid = false;
                } else {
                    $this->isValid = true;
                }
                $validateRequest->setValue($name);
            }
            return true;
        }

        return false;
    }
}