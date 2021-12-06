<?php

use app\core\App;
use app\controller\SiteController;
use app\controller\FormController;
use app\controller\DisplayController;
use app\controller\ListViewController;
use app\controller\AuthController;

require_once __DIR__."/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new App();
//$app->route()->get("/home", function (){return "hello world";});

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

$app->route()->get("/confirmation", [DisplayController::class, "displayConfirmationMessage"]);
$app->route()->post("/confirmation", [DisplayController::class, "displayConfirmationMessage"]);

$app->route()->get("/thankYou", [DisplayController::class, "displayThankYou"]);
$app->route()->post("/thankYou", [DisplayController::class, "displayThankYou"]);

$app->route()->get("/fsrDetailsAdmin", [DisplayController::class, "displayFSRDetailsAdmin"]);
$app->route()->post("/fsrDetailsAdmin", [DisplayController::class, "displayFSRDetailsAdmin"]);

$app->route()->get("/fsrDetailsDonor", [DisplayController::class, "displayFSRDetailsDonor"]);
$app->route()->post("/fsrDetailsDonor", [DisplayController::class, "displayFSRDetailsDonor"]);

$app->route()->get("/msrDetailsAdmin", [DisplayController::class, "displayMSRDetailsAdmin"]);
$app->route()->post("/msrDetailsAdmin", [DisplayController::class, "displayMSRDetailsAdmin"]);

$app->route()->get("/msrDetailsDonor", [DisplayController::class, "displayMSRDetailsDonor"]);
$app->route()->post("/msrDetailsDonor", [DisplayController::class, "displayMSRDetailsDonor"]);

$app->route()->get("/moneyDonationDetails", [DisplayController::class, "displayMoneyDonationDetails"]);
$app->route()->post("/moneyDonationDetails", [DisplayController::class, "displayMoneyDonationDetails"]);

$app->route()->get("/aidDonationDetails", [DisplayController::class, "displayAidDonationDetails"]);
$app->route()->post("/aidDonationDetails", [DisplayController::class, "displayAidDonationDetails"]);

$app->route()->get("/approvedMSRDetails", [DisplayController::class, "displayApprovedMSRDetails"]);
$app->route()->post("/approvedMSRDetails", [DisplayController::class, "displayApprovedMSRDetails"]);

$app->route()->get("/approvedFSRDetails", [DisplayController::class, "displayApprovedFSRDetails"]);
$app->route()->post("/approvedFSRDetails", [DisplayController::class, "displayApprovedFSRDetails"]);

$app->route()->get("/aidedMSRDetails", [DisplayController::class, "displayAidedMSRDetails"]);
$app->route()->post("/aidedMSRDetails", [DisplayController::class, "displayAidedMSRDetails"]);

$app->route()->get("/aidedFSRDetails", [DisplayController::class, "displayAidedFSRDetails"]);
$app->route()->post("/aidedFSRDetails", [DisplayController::class, "displayAidedFSRDetails"]);

$app->route()->get("/msrApplication", [FormController::class, "addMSRApplication"]);

//phpinfo();
$app->route()->get("/adminHome", [SiteController::class, "addAdminHome"]);

$app->route()->get("/donorHome", [SiteController::class, "addDonorHome"]);

$app->route()->post("/msrApplication", [FormController::class, "addMSRApplication"]);
$app->route()->get("/fsrApplication", [FormController::class, "addFSRApplication"]);
$app->route()->post("/fsrApplication", [FormController::class, "addFSRApplication"]);

$app->route()->get("/approvedRecipients", [ListViewController::class, "displayApprReci"]);
$app->route()->get("/aidedRecipients", [ListViewController::class, "displayAidedReci"]);
$app->route()->get("/fsRecipients", [ListViewController::class, "displayFSReci"]);
$app->route()->get("/msRecipients", [ListViewController::class, "displayMSReci"]);
$app->route()->get("/volunteers", [ListViewController::class, "displayVolunteers"]);
$app->route()->get("/donors", [ListViewController::class, "displayDonors"]);

$app->route()->get("/login", [AuthController::class, "login"]);

$app->route()->get("/aidDonationRequest", [FormController::class, "addAidDonation"]);
$app->run();