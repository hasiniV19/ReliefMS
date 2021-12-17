<?php

namespace app\core;
use app\core\Request;
use app\core\Response;
use app\core\Router;
use app\core\Session;

class App
{
    private Request $request;
    private Response $response;
    private Router $router;
    public Session $session;
    public static App $app;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        self::$app = $this;
    }

    public function route()
    {
        return $this->router;
    }

    public function run(){
        try {
            echo $this->router->resolve();
        } catch (\NotFoundException $error){
            $this->response->setStatus(404);
        } catch (\Exception $error){

        }


    }

}