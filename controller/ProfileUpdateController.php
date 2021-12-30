<?php

namespace app\controller;

use app\core\App;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\AidDonationDetailsModel;
use app\model\DonationDetailsModel;
use app\model\DonorApplication;
use app\model\DonorDetailsModel;
use app\model\DonorModel;
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
        $user_id = App::$app->session->get("user_id");
        $donorModel = new DonorModel();
        $donorModel->setAttributes(["user_id"=>$user_id]);
        $donorDetails = $donorModel->retrieve();

        if ($request->isPost()) {
            $body = $request->getBody();
            //var_dump($body);
            $body["user_id"] = App::$app->session->get("user_id");
            if($this->validate($body)){

                $model = new DonorApplication();
                $model->setAttributes($body);
                if ($model->save()) {
                    App::$app->session->setFlash("success","Your Application was Successfully Submitted");
                    $response->redirect("http://localhost:8080/donorHome");
                    exit;
                }
            }
            else{
                return $this->render("donorProfile", "main", $this->validateRequests);
            }
        }


        return $this->render("donorProfile", "main", $donorDetails);
    }
}