<?php

namespace app\controller;

class Application
{
    const DRAFT = 'DRAFT';
    const SUBMITTED = 'SUBMITTED';
    const DECLINED = 'DECLINED';
    const APPROVED = 'APPROVED';
    const CLOSED = 'CLOSED';

    protected $state;

    public function __construct(array $attributes = [])
    {
        $this->state = new DraftState($this);
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