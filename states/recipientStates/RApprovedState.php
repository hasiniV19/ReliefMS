<?php
namespace app\states\recipientStates;

use app\applications\RApplication;
use app\applications\ReciApplication;

class RApprovedState implements RecipientState
{


    public function approve(RApplication $application)
    {

    }

    public function decline(RApplication $application)
    {

    }

    public function __toString()
    {
        return ReciApplication::APPROVED;
    }

    public function aid(RApplication $application)
    {
        $application->setState(new RAidedState());
        $dbModels = $application->getDBModels();
        foreach ($dbModels as $dbModel){
            $dbModel->setAttributes(["status"=>"aided"]);
            $dbModel->update();
        }
    }
}