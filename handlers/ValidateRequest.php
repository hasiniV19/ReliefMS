<?php

namespace app\handlers;

class ValidateRequest
{
    private string $key;
    private $value;
    private $isValid;
    private $validError;

    public function __construct(string $key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->isValid = true;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
    }

    public function setValidError($validError)
    {
        $this->validError = $validError;
    }

    public function getIsValid()
    {
        return $this->isValid;
    }

    public function getValidError()
    {
        return $this->validError;
    }
}