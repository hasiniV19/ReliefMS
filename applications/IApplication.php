<?php

namespace app\applications;

use app\core\DBModel;
use app\states\ApplicationState;

interface IApplication
{
    public function approve();
    public function decline();
    public function setState(ApplicationState $state);
    public function getState();
    public function getDBModel(): DBModel;
}