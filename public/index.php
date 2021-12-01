<?php

use app\core\App;
use app\controller\SiteController;
use app\controller\FormController;
use app\controller\DisplayController;

require_once __DIR__."/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new App();
//$app->route()->get("/home", function (){return "hello world";});
$app->route()->get("/", [SiteController::class, "home"]);



$app->route()->get("/raiseFundForm", [SiteController::class, "raiseFundForm"]);

$app->route()->get("/", [SiteController::class, "homepage"]);


$app->route()->get("/form", [FormController::class, "addApplication"]);
$app->route()->post("/form", [FormController::class, "addApplication"]);
$app->route()->get("/volunteerApplication", [FormController::class, "addVolunteerApplication"]);
$app->route()->post("/volunteerApplication", [FormController::class, "addVolunteerApplication"]);

$app->route()->get("/donorApplication", [FormController::class, "addDonorApplication"]);
$app->route()->post("/donorApplication", [FormController::class, "addDonorApplication"]);
$app->route()->get("/donorDetails", [DisplayController::class, "displayDonorDetails"]);
$app->route()->post("/donorDetails", [DisplayController::class, "displayDonorDetails"]);
$app->route()->get("/volunteerDetails", [DisplayController::class, "displayVolunteerDetails"]);
$app->route()->post("/volunteerDetails", [DisplayController::class, "displayVolunteerDetails"]);


$app->route()->get("/msrApplication", [FormController::class, "addMSRApplication"]);

//phpinfo();
$app->run();