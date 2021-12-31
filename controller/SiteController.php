<?php


namespace app\controller;


use app\core\Controller;
use app\exception\NotFoundException;

class SiteController extends Controller
{
    public function homepage()
    {
        return $this->render("testhome","homeLayout");
    }

    public function addAdminHome()
    {
        return $this->render("adminHome","main");
    }

    public function addDonorHome()
    {
        return $this->render("donorHome","main");
    }
}