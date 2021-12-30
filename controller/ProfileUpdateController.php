<?php

namespace app\controller;

use app\core\App;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\AidDonationDetailsModel;
use app\model\DonationDetailsModel;
use app\model\DonorDetailsModel;
use app\model\DonorProfileModel;
use app\model\FsrDetailsModel;
use app\model\MoneyDonationDetailsModel;
use app\model\MsrDetailsModel;
use app\model\OtherNeedDetailsModel;
use app\model\QuarantDetailsModel;
use app\model\QuarantResidents;
use app\model\RecipientDetailsModel;
use app\model\VolunteerApplicationModel;
use app\model\VolunteerDetails;

class ProfileUpdateController extends Controller
{
    public function updateDonorProfile(Request $request, Response $response)
    {
        $userId = App::$app->session->get("user_id");
        $body = $request->getBody();
        var_dump($body);
//        $body["donor_id"] = App::$app->session->get("donor_id");
        $donorId = $body["donor_id"];
        App::$app->session->set("donor_id", $donorId);
        App::$app->session->set("view_type", "donors");
        $donorModel = new DonorProfileModel();

        $donorBody = ["donor_id"=>$donorId];
        $donorModel->setAttributes($donorBody);
        $data = $donorModel->retrieve();

        return $this->render("donorDetails", "main", $data);
    }
}