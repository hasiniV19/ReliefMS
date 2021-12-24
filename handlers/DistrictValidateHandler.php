<?php

namespace app\handlers;

class DistrictValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if ($validateRequest->getKey() === "district") {
            if (empty($validateRequest->getValue())) {
                $validateRequest->setValidError("*Enter your district");
                $validateRequest->setIsValid(false);

            } else {
                $district = $validateRequest->getValue();
                $district = filter_var($district, FILTER_SANITIZE_STRING);
                if(!preg_match("/^[a-zA-Z-' ]*$/", $district)){
                    $validateRequest->setValidError("*Only letters and white spaces allowed");
                    $validateRequest->setIsValid(false);
                }
                $validateRequest->setValue($district);
            }
            return true;
        }

        return false;
    }

}