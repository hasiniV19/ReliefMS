<?php

namespace app\controller;

class DraftState implements ApplicationState
{

    protected $context;

    public function __construct($context)
    {
        $this->context = $context;
    }

    public function submit()
    {
        $this->context->submitted_at = Carbon::now();
        $this->context->state = new SubmittedState($this->context);
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
        return Application::DRAFT;
    }
}