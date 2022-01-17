<?php

namespace app\applications;

use app\states\recipientStates\RecipientState;
interface RApplication
{
    public function approve();
    public function aid();
    public function decline();
    public function setState(RecipientState $state);
    public function getState();
    public function getDBModels();

}