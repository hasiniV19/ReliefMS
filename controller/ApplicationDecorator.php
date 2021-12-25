<?php

namespace app\controller;

abstract class ApplicationDecorator
{
    protected Application $decoratedApplication;

    public function __construct(IApplication $decoratedApplication)
    {
        $this->decoratedApplication = $decoratedApplication;
    }

    public function approve()
    {
        $this->decoratedApplication->approve();
    }
}