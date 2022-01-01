<?php
namespace app\states\recipientStates;

use app\applications\RApplication;


interface RecipientState
{
    public function aid(RApplication  $application);
    public function approve(RApplication $application);
    public function decline(RApplication $application);
    public function __toString();


}