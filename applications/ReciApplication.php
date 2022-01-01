<?php

namespace app\applications;

use app\states\ApplicationState;
use app\states\recipientStates\RApprovedState;
use app\states\recipientStates\RAidedState;
use app\states\recipientStates\RDeclinedState;
use app\states\recipientStates\RPendingState;
use app\states\recipientStates\RecipientState;


class ReciApplication implements RApplication
{
    const APPROVED = 'approved';
    const DECLINED = 'declined';
    const PENDING = 'pending';
    const AIDED = 'aided';

    private $dbModels;
    protected RecipientState $state;

    public function __construct($state, $dbModels)
    {
        $this->dbModels = $dbModels;
        $this->state = $this->strToState($state);
    }

    public function getDBModels()
    {
        return $this->dbModels;
    }

    public function strToState(string $state)
    {
        switch ($state){
            case self::APPROVED:
                return new RApprovedState();
                break;
            case self::PENDING:
                return new RPendingState();
                break;
            case self::DECLINED:
                return new RDeclinedState();
                break;
            case self::AIDED:
                return new RAidedState();
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

    public function setState(RecipientState $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function aid()
    {
        $this->state->aid($this);
    }
}