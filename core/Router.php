<?php


namespace app\core;



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
        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback){
            throw new NotFoundException();
        }
        if(is_array($callback)){
            $controller = new $callback[0]();
            return $controller->{$callback[1]}($this->request, $this->response);
        }
        return call_user_func($callback, $this->request, $this->response);
    }
}