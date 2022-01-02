<?php


namespace app\controller;


use app\core\App;
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
        if (App::$app->session->get("user_type")) {
            if (App::$app->session->get("user_type") === "admin") {
                $response->redirect("http://localhost:8080/adminHome");
                exit;
            }

            if (App::$app->session->get("user_type") === "donor") {
                $response->redirect("http://localhost:8080/donorHome");
                exit;
            }
        }
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

    public function errorNotFound()
    {
        return $this->render("notFound", "main");
    }
}