<?php


namespace app\core;


abstract class Controller
{
    public function render($view, $layout, $parameters=[])
    {
        $view = $this->getView($view, $parameters);
        $layout = $this->getLayout($layout);
        return str_replace("{{content-body}}", $view, $layout);
    }

    private function getView($view, $parameters){
        foreach ($parameters as $key=>$value){
            $$key = $value;
        }
        ob_start();
        include_once "../view/".$view.".php";

        return ob_get_clean();
    }

    private function getLayout($layout)
    {
        ob_start();
        include_once "../view/layout/".$layout.".php";

        return ob_get_clean();
    }
}