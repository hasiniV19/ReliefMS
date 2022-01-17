<?php

namespace app\applications;

use app\states\ApplicationState;

abstract class ComplexApplication implements IApplication
{
    protected IApplication $decoratedApplication;

    public function __construct(IApplication $decoratedApplication)
    {
        $this->decoratedApplication = $decoratedApplication;
    }

    public function approve()
    {
        $this->decoratedApplication->approve();
    }

    public function decline()
    {
        $this->decoratedApplication->decline();
    }


    public function setState(ApplicationState $state)
    {
        $this->decoratedApplication->setState($state);
    }

    public function getState()
    {
        return $this->decoratedApplication->getState();
    }

    public function getDBModels()
    {
        return $this->decoratedApplication->getDBModels();
    }
}