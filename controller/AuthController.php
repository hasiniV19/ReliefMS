<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

class AuthController extends Controller
{

    public function login(Request $request, Response $response)
    {
        return $this->render("login", "login_layout");
    }
}