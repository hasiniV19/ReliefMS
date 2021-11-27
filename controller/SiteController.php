<?php


namespace app\controller;


use app\core\Controller;

class SiteController extends Controller
{
    public function home(): string
    {
        return $this->render("confirmation", "main", ["id"=>1, "name"=>"hasini"]);
    }
}