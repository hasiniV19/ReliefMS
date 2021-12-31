<?php

namespace app\controller;

use app\core\DBModel;

class AidDonationApplication extends ApplicationDecorator
{
    public function __construct(IApplication $decoratedApplication)
    {
        parent::__construct($decoratedApplication);
    }


    public function approve()
    {
        $this->decoratedApplication->approve();
        $this->markAsAidedRecipient();
    }

    private function markAsAidedRecipient()
    {
        
    }
}