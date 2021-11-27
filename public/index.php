<?php

use app\core\App;
use app\controller\SiteController;
use app\controller\FormController;

require_once __DIR__."/../vendor/autoload.php";

$app = new App();
//$app->route()->get("/home", function (){return "hello world";});
$app->route()->get("/", [SiteController::class, "home"]);
$app->route()->get("/form", [FormController::class, "addApplication"]);
$app->route()->post("/form", [FormController::class, "addApplication"]);
//phpinfo();
$app->run();