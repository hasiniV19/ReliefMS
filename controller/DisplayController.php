<?php

namespace app\controller;

use app\applications\AidDonationApplication;
use app\core\App;
use app\core\Controller;
use app\core\DBModel;
use app\core\Request;
use app\core\Response;
use app\model\AidDonationDetailsModel;
use app\model\DonationDetailsModel;
use app\model\DonationListModel;
use app\model\DonationUpdateModel;
use app\model\DonorDetailsModel;
use app\model\FsrDetailsModel;
use app\model\MoneyDonationDetailsModel;
use app\model\MsrDetailsModel;
use app\model\OtherNeedDetailsModel;
use app\model\QuarantDetailsModel;
use app\model\QuarantResidents;
use app\model\RecipientApplication;
use app\model\RecipientDetailsModel;
use app\model\RecipientUpdateModel;
use app\model\VolunteerApplicationModel;
use app\model\VolunteerDetails;
use app\applications\Application;
use app\model\VolunteerUpdateModel;
use app\applications\ReciApplication;

class DisplayController extends Controller{

    private AuthController $authController;

    public function __construct()
    {
        $this->authController = new AuthController();
    }
    public function displayDonorDetails(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        $body = $request->getBody();
        $donorId = $body["donor_id"];
        App::$app->session->set("donor_id", $donorId);
        App::$app->session->set("view_type", "donors");

        $donorModel = new DonorDetailsModel();
        $donorBody = ["donor_id"=>$donorId];
        $donorModel->setAttributes($donorBody);
        $data_donor = $donorModel->retrieve();

        $donationListModel = new DonationListModel();
        $donationListModel->setAttributes($donorBody);
        $data_donations = $donationListModel->retrieve_records();

        $money_donations = [];
        $aid_donations =[];

        foreach ($data_donations as $donation) {
            if ($donation["donation_type"] === "money")
            {
                $money_donations[]=$donation;
            }
            else{
                $aid_donations[]=$donation;
            }
        }

        $data_donor["money_donations"] = $money_donations;
        $data_donor["aid_donations"] = $aid_donations;

        return $this->render("donorDetails", "main", $data_donor);
    }



    public function displayVolunteerDetails(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }
        if ($request->isPost()){
            $volunteerId = App::$app->session->get("volunteer_id");
            $volunteerModel = new VolunteerDetails();
            $volunteerUpdateModel = new VolunteerUpdateModel();

            $volunteerBody = ["volunteer_id"=>$volunteerId];
            $volunteerModel->setAttributes($volunteerBody);
            $volunteerUpdateModel->setAttributes($volunteerBody);

            $volunteerApplication = new Application($volunteerModel->retrieve()['status'], [$volunteerUpdateModel]);
            if (isset($_POST["approve"])) {
                $volunteerApplication->approve();
                $response->redirect("http://localhost:8080/volunteers");
                exit;
            }

            if (isset($_POST["decline"])) {
                $volunteerApplication->decline();
                $response->redirect("http://localhost:8080/volunteers");
                exit;
            }
        }

        $body = $request->getBody();
        $volunteerId = $body["volunteer_id"];
        App::$app->session->set("volunteer_id", $volunteerId);
        App::$app->session->set("view_type", "volunteers");
        $volunteerModel = new VolunteerDetails();

        $volunteerBody = ["volunteer_id"=>$volunteerId];
        $volunteerModel->setAttributes($volunteerBody);

        $data = $volunteerModel->retrieve();
        return $this->render("volunteerDetails", "main", $data);
    }

    public function displayConfirmationMessage(Request $request, Response $response)
    {
        return $this->render("confirmationApp", "main");
    }

    public function displayThankYou(Request $request, Response $response)
    {
        return $this->render("thankYou", "main");
    }

    public function getApplication( $detailsModel,$recipientUpdateModel)
    {
        $recipientId = App::$app->session->get("recipient_id");
        $comRUpdateModel = new RecipientUpdateModel();
        $comRUpdateModel->setAttributes(["table"=>"recipients"]);

        $recipientBody = ["recipient_id"=> $recipientId];
        $detailsModel->setAttributes($recipientBody);
        $recipientUpdateModel->setAttributes($recipientBody);
        $comRUpdateModel->setAttributes($recipientBody);

        $recipientApplication = new ReciApplication($detailsModel->retrieve()['status'],[$recipientUpdateModel,$comRUpdateModel]);

        return $recipientApplication;
    }
    public function displayFSRDetailsAdmin(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        if ($request->isPost()){
            $fsrDetailsModel = new FsrDetailsModel();
            $fsrecipientUpdateModel = new RecipientUpdateModel();
            $fsrecipientUpdateModel->setAttributes(['table'=>'fsrecipients']);
            $recipientApplication = $this->getApplication($fsrDetailsModel, $fsrecipientUpdateModel);

            if (isset($_POST["approve"])) {
                $recipientApplication->approve();
                $response->redirect("http://localhost:8080/fsRecipients");
                exit;
            }

            if (isset($_POST["decline"])) {
                $recipientApplication->decline();
                $response->redirect("http://localhost:8080/fsRecipients");
                exit;
            }
        }


        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "fsr");
        $fsrDetailsModel = new FsrDetailsModel();
        $fsrBody = ["recipient_id"=>$recipientId];
        $fsrDetailsModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>$recipientId];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_fsr,$data_recipient);
        $data["needs"] = $needs;

        return $this->render("fsrDetailsAdmin", "main", $data);
    }

    public function displayFSRDetailsDonor(Request $request, Response $response)
    {

        $auth = $this->authController->authenticate("donor");
        if ($auth !== true){
            return $auth;
        }

        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "fsr");
        $fsrDetailsDonorModel = new FsrDetailsModel();
        $fsrBody = ["recipient_id" => $recipientId];
        $fsrDetailsDonorModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsDonorModel->retrieve();

        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);
        $data_fsr["needs"] = $needs;


        return $this->render("fsrDetailsDonor", "main",$data_fsr);
    }

    public function displayMSRDetailsAdmin(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        if ($request->isPost()) {
            $msrDetailsModel = new MsrDetailsModel();
            $msrecipientUpdateModel = new RecipientUpdateModel();
            $msrecipientUpdateModel->setAttributes(['table'=>'msrecipients']);
            $recipientApplication = $this->getApplication($msrDetailsModel, $msrecipientUpdateModel);

            if (isset($_POST["approve"])) {
                $recipientApplication->approve();
                $response->redirect("http://localhost:8080/msRecipients");
                exit;
            }

            if (isset($_POST["decline"])) {
                $recipientApplication->decline();
                $response->redirect("http://localhost:8080/msRecipients");
                exit;
            }
        }
        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "msr");

        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["recipient_id"=>$recipientId];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();

        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>$recipientId];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();

        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        // quarant residents
        $msrId = $data_msr["msr_id"];
        $quarantResidentsModel = new QuarantDetailsModel();
        $quarantResidentsModel->setAttributes(["msr_id"=>$msrId]);
        $quarantResidentDetails = $quarantResidentsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_msr,$data_recipient);
        $data["needs"] = $needs;
        $data["quarantResidents"] = $quarantResidentDetails;

        return $this->render("msrDetailsAdmin", "main", $data);
    }

    public function displayMSRDetailsDonor(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("donor");
        if ($auth !== true){
            return $auth;
        }


        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "msr");
        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["recipient_id"=>$recipientId];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();

        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);
        $data_msr["needs"] = $needs;

        return $this->render("msrDetailsDonor", "main", $data_msr);
    }

    public function getDonationApplication()
    {
        $donation_id = App::$app->session->get("donation_id");
        $donationDetailsModel = new DonationDetailsModel();
        $donationUpdateModel = new DonationUpdateModel();

        $donationBody = ["donation_id"=>$donation_id];
        $donationDetailsModel->setAttributes($donationBody);
        $donationUpdateModel->setAttributes($donationBody);

        $donationApplication = new Application($donationDetailsModel->retrieve()['status'], [$donationUpdateModel]);
        return $donationApplication;
    }

    public function displayMoneyDonationDetails(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }
        if ($request->isPost()){
//            $donation_id = App::$app->session->get("donation_id");
//            $donationDetailsModel = new DonationDetailsModel();
//            $donationUpdateModel = new DonationUpdateModel();
//
//            $donationBody = ["donation_id"=>$donation_id];
//            $donationDetailsModel->setAttributes($donationBody);
//            $donationUpdateModel->setAttributes($donationBody);

            $mDonationApplication = $this->getDonationApplication();
            if (isset($_POST["approve"])) {
                $mDonationApplication->approve();
                $response->redirect("http://localhost:8080/donorDetails?donor_id=".App::$app->session->get('donor_id'));
                exit;
            }

            if (isset($_POST["decline"])) {
                $mDonationApplication->decline();
                $response->redirect("http://localhost:8080/donorDetails?donor_id=".App::$app->session->get('donor_id'));

                exit;
            }
        }

        $body = $request->getBody();
        $donation_id = (int) $body["donation_id"];
        App::$app->session->set("donation_id", $donation_id);
        $moneyDonationDetailsModel = new MoneyDonationDetailsModel();
        $moneyDonationBody = ["donation_id"=>$donation_id];
        $moneyDonationDetailsModel->setAttributes($moneyDonationBody);
        $data_money = $moneyDonationDetailsModel->retrieve();

        $donationDetailsModel = new DonationDetailsModel();
        $donationBody = ["donation_id"=>$donation_id];
        $donationDetailsModel->setAttributes($donationBody);
        $data_donation = $donationDetailsModel->retrieve();

        $data = array_merge($data_money,$data_donation);

        return $this->render("moneyDonationDetails", "main", $data);
    }

    public function displayAidDonationDetails(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        if ($request->isPost()) {
            // donation application created
            $aidDonationApplication = $this->getDonationApplication();
            $recipient_type = App::$app->session->get("recipient_type");

            if ($recipient_type === "msr") {
                $msrDetailsModel = new MsrDetailsModel();
                $msrecipientUpdateModel = new RecipientUpdateModel();
                $msrecipientUpdateModel->setAttributes(['table'=>'msrecipients']);
                $recipientApplication = $this->getApplication($msrDetailsModel, $msrecipientUpdateModel);
            } else {
                $fsrDetailsModel = new FsrDetailsModel();
                $fsrecipientUpdateModel = new RecipientUpdateModel();
                $fsrecipientUpdateModel->setAttributes(['table'=>'fsrecipients']);
                $recipientApplication = $this->getApplication($fsrDetailsModel, $fsrecipientUpdateModel);
            }

            if ($recipientApplication){
                $aidDonation = new AidDonationApplication($aidDonationApplication, $recipientApplication);
                $donor_id = App::$app->session->get("donor_id");
                var_dump($_POST);
                if (isset($_POST["approve"])) {
                    $aidDonation->approve();
                    $response->redirect("http://localhost:8080/donorDetails?donor_id=".$donor_id);
                    exit;
                }

                if (isset($_POST["decline"])) {
                    $aidDonation->decline();
                    $response->redirect("http://localhost:8080/donorDetails?donor_id=".$donor_id);
                    exit;
                }
            }
            else {
                var_dump("recipient Application didn't created");
            }


        }

        $body = $request->getBody();
        $donation_id = (int) $body["donation_id"];
        $aidDonationDetailsModel = new AidDonationDetailsModel();
        $aidDonationBody = ["donation_id"=> $donation_id];
        App::$app->session->set("donation_id", $donation_id);
        $aidDonationDetailsModel->setAttributes($aidDonationBody);
        $data_aid = $aidDonationDetailsModel->retrieve();

        $recipient_id = $data_aid["recipient_id"];
        App::$app->session->set("recipient_id", $recipient_id);

        $recipientModel = new RecipientDetailsModel();
        $recipientModel->setAttributes(["recipient_id"=>$recipient_id]);
        $recipient_type = $recipientModel->retrieve()["recipient_type"];

        $recipient_details = [];
        if ($recipient_type === "msr"){
            App::$app->session->set("recipient_type", "msr");
            $msrModel = new MsrDetailsModel();
            $msrModel->setAttributes(["recipient_id"=>$recipient_id]);
            $recipient_details = $msrModel->retrieve();
        } else {
            App::$app->session->set("recipient_type", "fsr");
            $fsrModel = new FsrDetailsModel();
            $fsrModel->setAttributes(["recipient_id"=>$recipient_id]);
            $recipient_details = $fsrModel->retrieve();
        }

        unset($recipient_details['status']);

        $donationDetailsModel = new DonationDetailsModel();
        $donationBody = ["donation_id"=>$donation_id];
        $donationDetailsModel->setAttributes($donationBody);
        $data_donation = $donationDetailsModel->retrieve();

        $data = array_merge($data_aid,$data_donation, $recipient_details);
        $data["recipient_type"] = $recipient_type;

        return $this->render("aidDonationDetails", "main", $data);
    }

    public function displayApprovedMSRDetails(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        if ($request->isPost()) {
            $msrDetailsModel = new MsrDetailsModel();
            $msrecipientUpdateModel = new RecipientUpdateModel();
            $msrecipientUpdateModel->setAttributes(['table'=>'msrecipients']);
            $recipientApplication = $this->getApplication($msrDetailsModel, $msrecipientUpdateModel);

            if (isset($_POST["aid"])) {
                $recipientApplication->aid();
                $response->redirect("http://localhost:8080/approvedRecipients");
                exit;
            }
        }

        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "msr");

        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["recipient_id"=>$recipientId];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();

        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>$recipientId];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();

        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $msrId = $data_msr["msr_id"];
        $quarantResidentsModel = new QuarantDetailsModel();
        $quarantResidentsModel->setAttributes(["msr_id"=>$msrId]);
        $quarantResidentDetails = $quarantResidentsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_msr,$data_recipient);
        $data["needs"] = $needs;
        $data["quarantResidents"] = $quarantResidentDetails;

        return $this->render("approvedMSRDetails", "main", $data);
    }

    public function displayApprovedFSRDetails(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        if ($request->isPost()){
            $fsrDetailsModel = new FsrDetailsModel();
            $fsrecipientUpdateModel = new RecipientUpdateModel();
            $fsrecipientUpdateModel->setAttributes(['table'=>'fsrecipients']);
            $recipientApplication = $this->getApplication($fsrDetailsModel, $fsrecipientUpdateModel);

            if (isset($_POST["aid"])) {
                $recipientApplication->aid();
                $response->redirect("http://localhost:8080/approvedRecipients");
                exit;
            }
        }
        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "fsr");
        $fsrDetailsModel = new FsrDetailsModel();
        $fsrBody = ["recipient_id"=>$recipientId];
        $fsrDetailsModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>$recipientId];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_fsr,$data_recipient);
        $data["needs"] = $needs;

        return $this->render("approvedFSRDetails", "main", $data);
    }

    public function displayAidedMSRDetails(Request $request, Response $response)
    {

        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "msr");

        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["recipient_id"=>$recipientId];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>$recipientId];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $msrId = $data_msr["msr_id"];
        $quarantResidentsModel = new QuarantDetailsModel();
        $quarantResidentsModel->setAttributes(["msr_id"=>$msrId]);
        $quarantResidentDetails = $quarantResidentsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_msr,$data_recipient);
        $data["needs"] = $needs;
        $data["quarantResidents"] = $quarantResidentDetails;

        return $this->render("aidedMSRDetails", "main", $data);

    }

    public function displayAidedFSRDetails(Request $request, Response $response)
    {
        $auth = $this->authController->authenticate("admin");
        if ($auth !== true){
            return $auth;
        }

        $body = $request->getBody();
        $recipientId = $body["recipient_id"];
        App::$app->session->set("recipient_id", $recipientId);
        App::$app->session->set("recipient_type", "fsr");

        $fsrDetailsModel = new FsrDetailsModel();
        $fsrBody = ["recipient_id"=>$recipientId];
        $fsrDetailsModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>$recipientId];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>$recipientId];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_fsr,$data_recipient);
        $data["needs"] = $needs;

        return $this->render("aidedFSRDetails", "main", $data);
    }
}
