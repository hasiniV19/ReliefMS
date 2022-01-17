<?php

namespace app\core;
use app\controller\SiteController;
use app\core\Request;
use app\core\Response;
use app\core\Router;
use app\core\Session;
use app\exception\ForbiddenException;
use app\exception\NotFoundException;
use app\exception\ServiceUnavailableException;
use app\exception\UnauthorizedException;

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
        } catch (NotFoundException $exception){
            $this->response->setStatus($exception->getCode());
            $this->response->redirect("http://localhost:8080/notFound");
            exit;
        } catch (ForbiddenException $exception)  {
            $this->response->setStatus($exception->getCode());
            $siteController = new SiteController();
            echo $siteController->errorForbidden();

        } catch (UnauthorizedException $exception) {
            $this->response->setStatus($exception->getCode());
            $siteController = new SiteController();
            echo $siteController->errorUnauthorized();

        } catch (ServiceUnavailableException $exception) {
            $this->response->setStatus($exception->getCode());
            $this->response->redirect("http://localhost:8080/serviceUnavailable");
            exit;
        }
        catch (\Exception $exception){
            $this->response->setStatus($exception->getCode());
            $siteController = new SiteController();
            echo $siteController->internalServerError();
        }


    }

}