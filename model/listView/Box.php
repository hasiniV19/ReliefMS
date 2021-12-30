<?php

namespace app\model\listView;
use app\core\BoxView;

class Box implements BoxView
{
    private string $boxTitle;
    private string $boxStatus;
    private string $boxType;
    private int $boxId;

    public function __construct(string $boxTitle, string $boxStatus, string $boxType, string $boxId)
    {
        $this->boxTitle = $boxTitle;
        $this->boxStatus = $boxStatus;
        $this->boxType = $boxType;
        $this->boxId = $boxId;
    }

    public function getBoxTitle(): string
    {
        return $this->boxTitle;
    }

    public function getBoxStatus(): string
    {
        return $this->boxStatus;
    }

    /**
     * @return string
     */
    public function getBoxType(): string
    {
        return $this->boxType;
    }

    /**
     * @return int|string
     */
    public function getBoxId() : int
    {
        return $this->boxId;
    }

}