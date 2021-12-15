<?php

namespace app\controller\listView;

class Box implements BoxView
{
    private string $boxTitle;
    private string $boxStatus;

    public function __construct(string $boxTitle, string $boxStatus)
    {
        $this->boxTitle = $boxTitle;
        $this->boxStatus = $boxStatus;
    }

    public function getBoxTitle(): string
    {
        return $this->boxTitle;
    }

    public function getBoxStatus(): string
    {
        return $this->boxStatus;
    }

}