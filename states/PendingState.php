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
        $dbModels = $application->getDBModels();
        foreach ($dbModels as $dbModel){
            $dbModel->setAttributes(["status"=>"approved"]);
            $dbModel->update();
        }
    }

    public function decline(IApplication $application)
    {
        $application->setState(new DeclinedState());
        $dbModels = $application->getDBModels();
        foreach ($dbModels as $dbModel){
            $dbModel->setAttributes(["status"=>"declined"]);
            $dbModel->update();
        }
    }
}