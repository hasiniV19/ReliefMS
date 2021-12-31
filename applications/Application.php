<?php

namespace app\applications;

use app\core\DBModel;
use app\states\ApprovedState;
use app\states\DeclinedState;
use app\states\PendingState;
use app\states\ApplicationState;

class Application implements IApplication
{
    const APPROVED = 'approved';
    const DECLINED = 'declined';
    const PENDING = 'pending';

    private DBModel $dbModel;
    protected ApplicationState $state;

    public function __construct($state, DBModel $dbModel)
    {
        $this->dbModel = $dbModel;
        $this->state = $this->strToState($state);
    }

    public function getDBModel():DBModel
    {
        return $this->dbModel;
    }

    public function strToState(string $state)
    {
        switch ($state){
            case self::APPROVED:
                return new ApprovedState();
                break;
            case self::PENDING:
                return new PendingState();
                break;
            case self::DECLINED:
                return new DeclinedState();
                break;
        }
        return null;
    }

    public function approve()
    {
        $this->state->approve($this);
    }

    public function decline()
    {
        $this->state->decline($this);
    }

    public function setState(ApplicationState $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }


}