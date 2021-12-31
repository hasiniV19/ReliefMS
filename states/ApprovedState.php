<?php

namespace app\states;

use app\applications\IApplication;
use app\applications\Application;

class ApprovedState implements ApplicationState
{
    protected $context;

    public function __construct(){}

    public function approve(IApplication $application){}

    public function decline(IApplication $application){}

    public function __toString(){
        return Application::APPROVED;
    }
}