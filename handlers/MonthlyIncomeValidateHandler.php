<?php

namespace app\handlers;

class MonthlyIncomeValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "monthly_income" || $validateRequest->getKey() === "amount") {
            if (empty($validateRequest->getValue())) {
                $validateRequest->setValidError("*Please fill this field");
                $validateRequest->setIsValid(false);

            }}else{
            $amount = $validateRequest->getValue();
            if(!filter_var($amount, FILTER_VALIDATE_FLOAT)){
                $validateRequest->setValidError("*Invalid input");
                $validateRequest->setIsValid(false);
            }
            $validateRequest->setValue($amount);
        }
        }
}