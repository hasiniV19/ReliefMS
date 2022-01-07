<?php

namespace app\controller;

use app\core\App;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\exception\ForbiddenException;
use app\exception\NotFoundException;
use app\exception\ServiceUnavailableException;
use app\exception\UnauthorizedException;
use app\model\AuthCreateModel;
use app\model\AuthModel;
use app\model\UserCreateModel;
use app\model\UserModel;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
            if ($request->isPost()) {
                $body = $request->getBody();
                $email = $body["email"];
                $password = $body["password"];

                $userModel = new UserModel();
                $userModel->setAttributes(["email" => $email]);
                $userDetails = $userModel->retrieve();

                if (!$userDetails) {
                    $body["login_err"] = "Invalid Login";
                    return $this->render("login", "login_layout", $body);
                }

                $authModel = new AuthModel();
                $authModel->setAttributes(["user_id" => $userDetails["user_id"]]);
                $authDetails = $authModel->retrieve();

                // authenticate password
                if (sha1($password) === $authDetails["password"]) {
                    App::$app->session->set("user_id", $userDetails["user_id"]);
                    App::$app->session->set("user_type", $userDetails["type"]);
                    if ($userDetails["type"] === "admin") {
                        $response->redirect("http://localhost:8080/adminHome");
                        exit;
                    }

                    if ($userDetails["type"] === "donor") {
                        $response->redirect("http://localhost:8080/donorHome");
                        exit;
                    }
                }

                $body["login_err"] = "Invalid Login";
                return $this->render("login", "login_layout", $body);
            }
            return $this->render("login", "login_layout");

    }

    public function register(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $body = $request->getBody();
            $body["type"] = "donor";
            $body["username"] = $body["email"];

            $userCreateModel = new UserCreateModel();
            $userCreateModel->setAttributes($body);
            $saveToUsers = $userCreateModel->save();

            $userId = $userCreateModel->getLastID();
            $authDetails = ["user_id"=>$userId, "password"=>sha1($body["password"])];
            $authCreateModel = new AuthCreateModel();
            $authCreateModel->setAttributes($authDetails);
            $saveToAuth = $authCreateModel->save();

            if ($saveToUsers && $saveToAuth){
                App::$app->session->set("user_id", $userId);
                App::$app->session->set("user_type", "donor");
                $response->redirect("http://localhost:8080/donorApplication");
                exit;
            }
        }
        return $this->render("login", "login_layout");
    }

    public function logout(Request $request, Response $response)
    {
        App::$app->session->close();
        $response->redirect("http://localhost:8080/");
        exit;
    }

    public function authenticate($user_types)
    {
            if (!App::$app->session->get("user_type")) {
                throw new UnauthorizedException();
            }

            if (!in_array(App::$app->session->get("user_type"), $user_types, true)) {
                throw new ForbiddenException();
            }
    }

}