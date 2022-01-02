<?php


namespace app\controller;


use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\exception\NotFoundException;

class SiteController extends Controller
{
    private AuthController $authController;

    public function __construct()
    {
        $this->authController = new AuthController();
    }

    public function homepage(Request $request, Response $response)
    {
        return $this->render("testhome","homeLayout");
    }

    public function addAdminHome()
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        return $this->render("adminHome","main");
    }

    public function addDonorHome()
    {
        $auth = $this->authController->authenticate("donor");
        if ($auth !== true){
            return $auth;
        }

        return $this->render("donorHome","main");
    }
}