<?php

namespace app\handlers;

class HaveVehicleValidateHandler extends ValidateHandler
{
    protected function  validateRequestImp(ValidateRequest $validateRequest)
    {
        if ($validateRequest->getKey() === "have_vehicle") {
            if (empty($validateRequest->getValue())) {
                $validateRequest->setValidError("*Select whether you have a vehicle or not");
                $validateRequest->setIsValid(false);

            } else {
                $have_vehicle = $validateRequest->getValue();
                $validateRequest->setValue($have_vehicle);
            }
            return true;
        }
        return false;
    }
}