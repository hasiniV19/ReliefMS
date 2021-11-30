<?php


namespace app\controller;


use app\core\Controller;

class SiteController extends Controller
{
    public function home(): string
    {
        return $this->render("confirmation", "main", ["id"=>1, "name"=>"hasini"]);
    }


    public function raiseFundForm()
    {
        return $this->render("raiseFundForm","main");
    }

    public function homepage()
    {
        return $this->render("testhome","main");

    }
}