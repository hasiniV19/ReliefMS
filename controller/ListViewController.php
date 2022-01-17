<?php

namespace app\controller;

use app\core\App;
use app\core\BoxView;
use app\factory\BoxFactory;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\DonorDetailsModel;
use app\model\ListViewModel;
use app\model\RecipientsStatusModel;
use app\model\VolunteerDetails;

class ListViewController extends Controller
{

    private BoxFactory $boxViewFactory;
    private AuthController $authController;


    public function __construct(){
        $this->authController = new AuthController();
    }

    public function displayApprReci(Request $request, Response $response)
    {
        $this->authController->authenticate(["admin", "donor"]);

        $reciStatusModel = new RecipientsStatusModel();
        $reciStatusModel->setAttributes(["status"=>"approved", "table"=>"fsrecipients"]);
        $detailsFSR = $reciStatusModel->retrieve_records();

        foreach ($detailsFSR as &$detail){

            $detail["recipient_type"] = "Financial";
        }

        $reciStatusModel->setAttributes(["status"=>"approved", "table"=>"msrecipients"]);
        $detailsMSR = $reciStatusModel->retrieve_records();

        foreach ($detailsMSR as &$detail){
            $detail["recipient_type"] = "Medical";
        }

        $details = array_merge($detailsFSR, $detailsMSR);
        App::$app->session->set("view_type", "approvedRecipients");
        return $this->displayListView($details, 'name', 'recipient_type', 'Recipients', 'approvedRecipients', 'recipient_id');
    }

    public function displayAidedReci(Request $request, Response $response)
    {
        $this->authController->authenticate(["admin"]);

        $reciStatusModel = new RecipientsStatusModel();
        $reciStatusModel->setAttributes(["status"=>"aided", "table"=>"fsrecipients"]);
        $detailsFSR = $reciStatusModel->retrieve_records();
        foreach ($detailsFSR as &$detail){
            $detail["recipient_type"] = "Financial";
        }

        $reciStatusModel->setAttributes(["status"=>"aided", "table"=>"msrecipients"]);
        $detailsMSR = $reciStatusModel->retrieve_records();
        foreach ($detailsMSR as &$detail){
            $detail["recipient_type"] = "Medical";
        }

        $details = array_merge($detailsFSR, $detailsMSR);

        App::$app->session->set("view_type", "aidedRecipients");
        //$details = [["reciName"=>"Hasini", "reciType"=>"financial"], ["reciName"=>"Dinithi", "reciType"=>"medical"]];
        return $this->displayListView($details, 'name', 'recipient_type', 'Aided Recipients', 'aidedRecipients', 'recipient_id');
    }

    public function displayFSReci(Request $request, Response $response)
    {
        $this->authController->authenticate(["admin"]);

        $reciStatusModel = new RecipientsStatusModel();
        $reciStatusModel->setAttributes(["status"=>"pending", "table"=>"fsrecipients"]);
        $details = $reciStatusModel->retrieve_records();
        App::$app->session->set("view_type", "fsRecipients");
        return $this->displayListView($details, 'name', 'status', 'Financial Recipients', 'fsRecipient', 'recipient_id');

    }

    public function displayMSReci(Request $request, Response $response)
    {
        $this->authController->authenticate(["admin"]);


        $reciStatusModel = new RecipientsStatusModel();
        $reciStatusModel->setAttributes(["status"=>"pending", "table"=>"msrecipients"]);
        $details = $reciStatusModel->retrieve_records();
        App::$app->session->set("view_type", "msRecipients");
        return $this->displayListView($details, 'name', 'status', 'Medical Support Recipients', 'msRecipients', 'recipient_id');
    }

    public function displayVolunteers(Request $request, Response $response)
    {
        $this->authController->authenticate(["admin"]);

        $volunteerModel = new VolunteerDetails();
        $details = $volunteerModel->retrieve_all();
        App::$app->session->set("view_type", "volunteers");
        return $this->displayListView($details, 'name', 'status', 'Volunteers', 'volunteers', 'volunteer_id');
    }

    public function displayDonors(Request $request, Response $response)
    {
        $this->authController->authenticate(["admin"]);

        $donorModel = new DonorDetailsModel();
        $details = $donorModel->retrieve_all();
        App::$app->session->set("view_type", "donors");
        return $this->displayListView($details, 'name', 'district', 'Donors', 'donors', 'donor_id');
    }

    private function displayListView($details, $boxTitle, $boxStatus, $title, $type, $id){
        $this->boxViewFactory = new BoxFactory();
        $boxes = [];
        foreach ($details as $detail){
            $box = $this->boxViewFactory->getBoxView($detail[$boxTitle], $detail[$boxStatus], $type, $detail[$id]);
            $boxes[] = $box;
        }

        return $this->render("listView", "main", ["boxes"=>$boxes, "title"=>$title]);
    }


}