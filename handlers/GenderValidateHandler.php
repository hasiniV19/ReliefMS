<?php

namespace app\handlers;

class GenderValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {


        if ($validateRequest->getKey() === "gender") {
            if (empty($validateRequest->getValue())) {
                $this->validError = "Invalid submission. Please try again";
                $this->isValid = false;

            } else {
                $gender = $validateRequest->getValue();
                $this->isValid = true;

                $validateRequest->setValue($gender);
            }
            return true;
        }

        return false;
    }
}