<?php
namespace app\states\recipientStates;

use app\applications\RApplication;
use app\applications\ReciApplication;
use app\states\DeclinedState;


class RPendingState implements RecipientState
{

    public function approve(RApplication $application)
    {
        $application->setState(new RApprovedState());
        $dbModels = $application->getDBModels();
        foreach ($dbModels as $dbModel){
            $dbModel->setAttributes(["status"=>"approved"]);
            $dbModel->update();
        }
    }

    public function decline(RApplication $application)
    {
        $application->setState(new RDeclinedState());
        $dbModels = $application->getDBModels();
        foreach ($dbModels as $dbModel){
            $dbModel->setAttributes(["status"=>"declined"]);
            $dbModel->update();
        }
    }

    public function __toString()
    {
        return ReciApplication::PENDING;
    }

    public function aid(RApplication $application)
    {
    }
}