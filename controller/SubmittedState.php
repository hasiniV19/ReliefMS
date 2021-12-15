<?php

namespace app\controller;


class SubmittedState implements ApplicationState
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
        //$this->context->rejected_at = Carbon::now();
        $this->context->state = new DeclinedState($this->context);
    }

    public function approve()
    {
        //$this->context->approved_at = Carbon::now();
        $this->context->state = new ApprovedState($this->context);
    }

    public function close()
    {
        throw new \Exception('Not allowed transition');
    }

    public function __toString()
    {
        return Application::SUBMITTED;
    }
}