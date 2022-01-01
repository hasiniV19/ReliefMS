<?php
namespace app\states\recipientStates;

use app\applications\RApplication;
use app\applications\ReciApplication;

class RDeclinedState implements RecipientState
{

    public function __construct()
    {
    }

    public function approve(RApplication $application)
    {

    }

    public function decline(RApplication $application)
    {

    }

    public function __toString()
    {
        return ReciApplication::DECLINED;
    }

    public function aid(RApplication $application)
    {

    }
}