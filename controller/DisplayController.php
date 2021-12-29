<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\AidDonationDetailsModel;
use app\model\DonationDetailsModel;
use app\model\DonorDetailsModel;
use app\model\FsrDetailsModel;
use app\model\MoneyDonationDetailsModel;
use app\model\MsrDetailsModel;
use app\model\OtherNeedDetailsModel;
use app\model\RecipientDetailsModel;
use app\model\VolunteerApplicationModel;
use app\model\VolunteerDetails;

class DisplayController extends Controller{
    public function displayDonorDetails(Request $request, Response $response)
    {
        $donorModel = new DonorDetailsModel();

        $donorBody = ["donor_id"=>2];
        $donorModel->setAttributes($donorBody);
        $data = $donorModel->retrieve();

        return $this->render("donorDetails", "main", $data);
    }

    public function displayVolunteerDetails(Request $request, Response $response)
    {
        $volunteerModel = new VolunteerDetails();

        $volunteerBody = ["volunteer_id"=>3];
        $volunteerModel->setAttributes($volunteerBody);
        $volunteerApplication = new Application($volunteerModel);
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

    public function displayFSRDetailsAdmin(Request $request, Response $response)
    {
        $fsrDetailsModel = new FsrDetailsModel();
        $fsrBody = ["fsr_id"=>16];
        $fsrDetailsModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>25];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>25];
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
        $fsrDetailsDonorModel = new FsrDetailsModel();
        $fsrBody = ["fsr_id" => 1];
        $fsrDetailsDonorModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsDonorModel->retrieve();

        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>1];
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
        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["msr_id"=>3];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>27];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>27];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_msr,$data_recipient);
        $data["needs"] = $needs;

        return $this->render("msrDetailsAdmin", "main", $data);
    }

    public function displayMSRDetailsDonor(Request $request, Response $response)
    {
        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["msr_id"=>2];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();

        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>3];
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

    public function displayMoneyDonationDetails(Request $request, Response $response)
    {
        $moneyDonationDetailsModel = new MoneyDonationDetailsModel();
        $moneyDonationBody = ["m_donation_id"=>1];
        $moneyDonationDetailsModel->setAttributes($moneyDonationBody);
        $data_money = $moneyDonationDetailsModel->retrieve();

        $donationDetailsModel = new DonationDetailsModel();
        $donationBody = ["donation_id"=>1];
        $donationDetailsModel->setAttributes($donationBody);
        $data_donation = $donationDetailsModel->retrieve();

        $data = array_merge($data_money,$data_donation);

        return $this->render("moneyDonationDetails", "main", $data);
    }

    public function displayAidDonationDetails(Request $request, Response $response)
    {

//        $model = new AidDonationDetails();
//        $details = $model->retrive();
//        return $this->render("aidDonationDetails", "main", $details);
//        if ($request->isPost()){
//            $aidDonation = new AidDonationApplication(new Application());
//           if(isset($_POST["approve"])){
//                $aidDonation->approve();
//           }
//        }
        $aidDonationDetailsModel = new AidDonationDetailsModel();
        $aidDonationBody = ["a_donation_id"=>1];
        $aidDonationDetailsModel->setAttributes($aidDonationBody);
        $data_aid = $aidDonationDetailsModel->retrieve();

        $donationDetailsModel = new DonationDetailsModel();
        $donationBody = ["donation_id"=>2];
        $donationDetailsModel->setAttributes($donationBody);
        $data_donation = $donationDetailsModel->retrieve();

        $data = array_merge($data_aid,$data_donation);

        return $this->render("aidDonationDetails", "main", $data);
    }

    public function displayApprovedMSRDetails(Request $request, Response $response)
    {
        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["msr_id"=>2];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>3];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>3];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_msr,$data_recipient);
        $data["needs"] = $needs;

        return $this->render("approvedMSRDetails", "main", $data);
    }

    public function displayApprovedFSRDetails(Request $request, Response $response)
    {
        $fsrDetailsModel = new FsrDetailsModel();
        $fsrBody = ["fsr_id"=>1];
        $fsrDetailsModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>1];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>1];
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

    public function displayAidedMSRDetails(Request $request, Response $response)
    {
        $msrDetailsModel = new MsrDetailsModel();
        $msrBody = ["msr_id"=>3];
        $msrDetailsModel->setAttributes($msrBody);
        $data_msr = $msrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>27];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>27];
        $otherNeedDetailsModel->setAttributes($needBody);
        $data_need = $otherNeedDetailsModel->retrieve_records();

        $data_needs = [];
        foreach ($data_need as $data){
            array_push($data_needs, $data["need"]);
        }

        $needs = implode(",", $data_needs);

        $data = array_merge($data_msr,$data_recipient);
        $data["needs"] = $needs;

        return $this->render("aidedMSRDetails", "main", $data);

    }

    public function displayAidedFSRDetails(Request $request, Response $response)
    {
        $fsrDetailsModel = new FsrDetailsModel();
        $fsrBody = ["fsr_id"=>16];
        $fsrDetailsModel->setAttributes($fsrBody);
        $data_fsr = $fsrDetailsModel->retrieve();


        $recipientDetailsModel = new RecipientDetailsModel();
        $recipientBody = ["recipient_id"=>25];
        $recipientDetailsModel->setAttributes($recipientBody);
        $data_recipient = $recipientDetailsModel->retrieve();


        $otherNeedDetailsModel = new OtherNeedDetailsModel();
        $needBody = ["recipient_id"=>25];
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
