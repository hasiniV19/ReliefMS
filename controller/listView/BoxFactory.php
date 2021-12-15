<?php

namespace app\controller\listView;

class BoxFactory
{

    public function getBoxView(string $boxTitle, string $boxStatus): BoxView
    {
        // TODO: Implement getBoxView() method.
        return new Box($boxTitle, $boxStatus);
    }
}
