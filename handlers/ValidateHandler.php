<?php

namespace app\handlers;

abstract class ValidateHandler
{
    protected $isValid;
    protected $validError;

    protected ValidateHandler $successor;

//    public function __construct()
//    {
//        $this->successor = null;
//    }

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
        }
    }

    public function isValid()
    {
        return $this->isValid;
    }

    public function getValidError()
    {
        return $this->validError;
    }
}   