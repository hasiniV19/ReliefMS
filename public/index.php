<?php

use app\core\App;
use app\controller\SiteController;
use app\controller\FormController;

require_once __DIR__."/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new App();
//$app->route()->get("/home", function (){return "hello world";});
$app->route()->get("/", [SiteController::class, "home"]);
$app->route()->get("/raiseFundForm", [SiteController::class, "raiseFundForm"]);
$app->route()->get("/form", [FormController::class, "addApplication"]);
$app->route()->post("/form", [FormController::class, "addApplication"]);
//phpinfo();
$app->run();