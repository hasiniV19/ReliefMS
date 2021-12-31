<?php

namespace app\handlers;

abstract class ValidateHandler
{
    protected ValidateHandler $successor;


    public function setSuccessor(ValidateHandler $successor):void
    {
        $this->successor = $successor;
    }

    protected abstract function validateRequestImp(ValidateRequest $validateRequest);

    public final function validateRequest(ValidateRequest $validateRequest){
        $handledByThisNode = $this->validateRequestImp($validateRequest);
        if(!$handledByThisNode && $this->successor != null)
        {
            $this->successor->validateRequest($validateRequest);
        }else{
            return ;
        }
    }

}   