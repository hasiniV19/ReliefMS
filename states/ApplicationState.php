<?php

namespace app\states;

use app\applications\IApplication;

interface ApplicationState
{
    public function __construct();
    public function approve(IApplication $application);
    public function decline(IApplication $application);
    public function __toString();
}