<?php

namespace app\applications;

use app\core\DBModel;

class AidDonationApplication extends ApplicationDecorator
{
    private ReciApplication $recipientApplication;
    public function __construct(IApplication $decoratedApplication, ReciApplication $recipientApplication)
    {
        parent::__construct($decoratedApplication);
        $this->recipientApplication = $recipientApplication;
    }


    public function approve()
    {
        $this->decoratedApplication->approve();
        $this->markAsAidedRecipient();
    }

    private function markAsAidedRecipient()
    {
        $this->recipientApplication->aid();
    }

    public function decline()
    {
        $this->decoratedApplication->decline();
    }
}