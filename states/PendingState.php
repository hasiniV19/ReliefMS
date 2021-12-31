<?php

namespace app\states;

use app\applications\Application;
use app\applications\IApplication;

class PendingState implements ApplicationState
{

    public function __construct(){}


    public function __toString()
    {
        return Application::PENDING;
    }

    public function approve(IApplication $application)
    {
        $application->setState(new ApprovedState());
        $application->getDBModel()->setAttributes(["status"=>"approved"]);
        $application->getDBModel()->update();
    }

    public function decline(IApplication $application)
    {
        $application->setState(new DeclinedState());
        $application->getDBModel()->setAttributes(["status"=>"declined"]);
        $application->getDBModel()->update();
    }
}