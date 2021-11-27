<?php


namespace app\core;


class Request
{

    public function getMethod(): string
    {
//        echo '<pre>';
//        var_dump($_SERVER);
//        echo '</pre>';
//        exit;
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getPath()
    {
        $url = $_SERVER["REQUEST_URI"] ?? "/";
        $index = strpos($url, "?") ?? false;
        if(!$index){
            return $url;
        }
        return substr($url, 0, $index);
    }

    public function getBody()
    {
        $details = [];
        if($this->getMethod() === "get"){
            foreach ($_GET as $key=>$value){
                $details[$key] = $value;
            }
        } else if($this->getMethod() === "post"){
            foreach ($_POST as $key=>$value){
                $details[$key] = $value;
            }
        }
        return $details;
    }

    public function isPost(): bool
    {
        return $this->getMethod() === "post";
    }
}