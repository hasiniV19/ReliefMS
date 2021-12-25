<?php

namespace app\handlers;

class GenderValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if ($validateRequest->getKey() === "gender") {
            if (empty($validateRequest->getValue())) {
                $validateRequest->setValidError("*Invalid submission. Please try again");
                $validateRequest->setIsValid(false);

            } else {
                $gender = $validateRequest->getValue();

                $validateRequest->setValue($gender);
            }
            return true;
        }

        return false;
    }
}