<?php

namespace app\core;

interface BoxView
{
    public function getBoxTitle():string;
    public function getBoxStatus():string;
    public function getBoxType(): string;
    public function getBoxId(): int;
}