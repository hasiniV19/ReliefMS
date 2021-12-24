<?php

namespace app\handlers;

class IsThereStudentsValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if ($validateRequest->getKey() === "is_there_students") {
            if (empty($validateRequest->getValue())) {
                $validateRequest->setValidError("*Select whether if there any students");
                $validateRequest->setIsValid(false);

            } else {
                $is_there_students = $validateRequest->getValue();
                $validateRequest->setValue($is_there_students);
            }
            return true;
        }
        return false;
    }
}