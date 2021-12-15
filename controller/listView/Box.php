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
        // TODO: Implement getBoxTitle() method.
        return $this->boxTitle;
    }

    public function getBoxStatus(): string
    {
        // TODO: Implement getBoxStatus() method.
        return $this->boxStatus;
    }

}