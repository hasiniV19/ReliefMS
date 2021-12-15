<?php

namespace app\controller\listView;

interface BoxView
{
    public function getBoxTitle():string;
    public function getBoxStatus():string;
}