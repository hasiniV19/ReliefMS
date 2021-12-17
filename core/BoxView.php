<?php

namespace app\core;

interface BoxView
{
    public function getBoxTitle():string;
    public function getBoxStatus():string;
}