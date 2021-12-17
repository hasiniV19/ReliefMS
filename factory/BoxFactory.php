<?php

namespace app\factory;
use app\core\BoxView;
use app\model\listView\Box;

class BoxFactory
{

    public function getBoxView(string $boxTitle, string $boxStatus): BoxView
    {
        return new Box($boxTitle, $boxStatus);
    }
}
