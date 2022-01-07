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
        $this->authController->authenticate("admin");


        return $this->render("adminHome","main");
    }

    public function addDonorHome()
    {
        $this->authController->authenticate("donor");


        return $this->render("donorHome","main");
    }

    public function errorNotFound()
    {
        return $this->render("error", "main", ["errorCode"=>404, "errorMsg"=>"OOPS. Looks like the page you're looking for no longer exists"]);
    }

    public function errorServiceUnavailable()
    {
        return $this->render("error", "main", ["errorCode"=>503, "errorMsg"=>"OOPS &#128533; The server is currently unable to handle the request due to a temporary overloading or maintenance of the server."]);
    }

    public function errorForbidden()
    {
        return $this->render("error", "main", ["errorCode"=>403, "errorMsg"=>"You don't have permission to access / on this server"]);
    }

    public function errorUnauthorized()
    {
        return $this->render("error", "main", ["errorCode"=>401, "errorMsg"=>"Not Authorized"]);
    }

    public function internalServerError()
    {
        return $this->render("error", "main", ["errorCode"=>500, "errorMsg"=>"Oops &#128533; something went wrong"]);
    }
}