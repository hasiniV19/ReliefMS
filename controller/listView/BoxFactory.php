<?php

namespace app\controller\listView;

class BoxFactory
{

    public function getBoxView(string $boxTitle, string $boxStatus): BoxView
    {
        return new Box($boxTitle, $boxStatus);
    }
}
