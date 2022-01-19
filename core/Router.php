<?php


namespace app\core;



use app\controller\FormController;
use app\controller\SiteController;
use app\exception\NotFoundException;
//use NotFoundException;

class Router
{
    private Response $response;
    private Request  $request;
    private array $routes = [];

    public function __construct($request, $response)
    {
        $this->response = $response;
        $this->request = $request;
    }
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        if ($path === "/login" && $method === "get" && App::$app->session->get("user_type")) {
            if (App::$app->session->get("user_type") === "admin"){
                $controller = new SiteController();
                return $controller->addAdminHome();
            }

            if (App::$app->session->get("user_type") === "donor") {
                if (App::$app->session->get("donor_state") === "pending") {
                    $controller = new FormController();
                    return $controller->addDonorApplication($this->request, $this->response);
                }
                $controller = new SiteController();
                return $controller->addDonorHome();
            }
        }

        if ($path === "/volunteerApplication" && $method === "get" && App::$app->session->get("app_state") === "completed") {
                App::$app->session->unset_var("app_state");
//                $controller = new SiteController();
//                return $controller->homepage($this->request, $this->response);
            $this->response->redirect("http://localhost:8080/");
            exit;
        }

        if ($path === "/msrApplication" && $method === "get" && App::$app->session->get("app_state") === "completed") {
            App::$app->session->unset_var("app_state");
//            $controller = new SiteController();
//            return $controller->homepage($this->request, $this->response);
            $this->response->redirect("http://localhost:8080/");
            exit;
        }

        if ($path === "/fsrApplication" && $method === "get" && App::$app->session->get("app_state") === "completed") {
            App::$app->session->unset_var("app_state");
//            $controller = new SiteController();
//            return $controller->homepage($this->request, $this->response);
            $this->response->redirect("http://localhost:8080/");
            exit;
        }

        if ($path === "/donorApplication" && $method === "get" && App::$app->session->get("app_state") === "completed") {
            App::$app->session->unset_var("app_state");
            $controller = new SiteController();
            return $controller->addDonorHome();
        }

//        if ($path === "/aidDonationRequest" && $method === "get" && App::$app->session->get("app_state") === "completed") {
//            App::$app->session->unset_var("app_state");
//            $controller = new SiteController();
//            return $controller->addDonorHome();
//        }


            $callback = $this->routes[$method][$path] ?? false;



        if(!$callback){
            throw new NotFoundException();
        }
        if(is_array($callback)){
            $controller = new $callback[0]();
            return $controller->{$callback[1]}($this->request, $this->response);
        }
    }
}