<?php

namespace app\controller;

class ApprovedState implements ApplicationState
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
        //$this->context->closed_at = Carbon::now();
        $this->context->state = new ClosedState($this->context);
    }

    public function __toString()
    {
        return Application::APPROVED;
    }

}