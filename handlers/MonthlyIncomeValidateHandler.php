<?php

namespace app\handlers;

class MonthlyIncomeValidateHandler extends ValidateHandler
{

    protected function validateRequestImp(ValidateRequest $validateRequest)
    {
        if($validateRequest->getKey() === "monthly_income") {
            if (empty($validateRequest->getValue())) {
                $validateRequest->setValidError("Enter your monthly income");
                $validateRequest->setIsValid(false);

            }}else{
            $monthly_income = $validateRequest->getValue();
            if(!filter_var($monthly_income, FILTER_VALIDATE_FLOAT)){
                $validateRequest->setValidError("*Invalid monthly income");
                $validateRequest->setIsValid(false);
            }
            $validateRequest->setValue($monthly_income);
        }
        }
}