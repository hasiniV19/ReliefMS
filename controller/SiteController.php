<?php


namespace app\controller;


use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\exception\NotFoundException;

class SiteController extends Controller
{
    public function homepage(Request $request, Response $response)
    {
        try {
            throw new NotFoundException();
        } catch (NotFoundException $exception) {
            return $this->render($exception->getMessage(), "main");
        }

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