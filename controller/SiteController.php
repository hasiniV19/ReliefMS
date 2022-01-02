<?php


namespace app\controller;


use app\core\App;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\exception\NotFoundException;

class SiteController extends Controller
{
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
        return $this->render("adminHome","main");
    }

    public function addDonorHome()
    {
        return $this->render("donorHome","main");
    }

    public function errorNotFound()
    {
        return $this->render("notFound", "main");
    }
}