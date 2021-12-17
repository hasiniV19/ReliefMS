<?php

namespace app\controller;

class DeclinedState implements ApplicationState
{
    protected $context;

    public function __construct($context)
    {
        $this->context = $context;
    }

    public function submit()
    {
        throw new \Exception('Not allowed transition');
    }

    public function decline()
    {
        throw new \Exception('Not allowed transition');
    }

    public function approve()
    {
        throw new \Exception('Not allowed transition');
    }

    public function close()
    {
        throw new \Exception('Not allowed transition');
    }

    public function __toString()
    {
        return Application::DECLINED;
    }
}