<?php

namespace app\controller;

use app\core\DBModel;

class Application implements IApplication
{
    const DRAFT = 'DRAFT';
    const SUBMITTED = 'SUBMITTED';
    const DECLINED = 'DECLINED';
    const APPROVED = 'APPROVED';
    const CLOSED = 'CLOSED';

    private $dbModel;
    protected $state;

    public function __construct(DBModel $dbModel, array $attributes = [])
    {
        $this->dbModel = $dbModel;
        $this->state = $dbModel->retrieve()['status'];

    }

    public function submit()
    {
        $this->state->submit();
    }

    public function approve()
    {
        $this->state->approve();
    }

    public function decline()
    {
        $this->state->decline();
    }

    public function close()
    {
        $this->state->close();
    }

    public function getStateAttribute()
    {
        return $this->state;
    }

    public function setStateAttribute($value)
    {
        $this->state = $value;
    }
}