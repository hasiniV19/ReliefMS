<?php

namespace app\controller;

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

    public function __construct()
    {
        $this->authController = new AuthController();
    }

    public function displayApprReci(Request $request, Response $response)
    {
        $auth = $this->authController->authenticateForTwo();
        if ($auth !== true){
            return $auth;
        }

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
        return $this->displayListView($details, 'name', 'recipient_type', 'Recipients', 'approvedRecipients', 'recipient_id');
    }

    public function displayAidedReci(Request $request, Response $response)
    {
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

        //$details = [["reciName"=>"Hasini", "reciType"=>"financial"], ["reciName"=>"Dinithi", "reciType"=>"medical"]];
        return $this->displayListView($details, 'name', 'recipient_type', 'Aided Recipients', 'aidedRecipients', 'recipient_id');
    }

    public function displayFSReci(Request $request, Response $response)
    {
        $reciStatusModel = new RecipientsStatusModel();
        $reciStatusModel->setAttributes(["status"=>"pending", "table"=>"fsrecipients"]);
        $details = $reciStatusModel->retrieve_records();
        return $this->displayListView($details, 'name', 'status', 'Financial Recipients', 'fsRecipient', 'recipient_id');




        return $this->displayListView($details, 'fsReciName', 'district', 'Financial Support Recipients');
    }

    public function displayMSReci(Request $request, Response $response)
    {
        $reciStatusModel = new RecipientsStatusModel();
        $reciStatusModel->setAttributes(["status"=>"pending", "table"=>"msrecipients"]);
        $details = $reciStatusModel->retrieve_records();
        return $this->displayListView($details, 'name', 'status', 'Medical Support Recipients', 'msRecipients', 'recipient_id');
    }

    public function displayVolunteers(Request $request, Response $response)
    {
        $volunteerModel = new VolunteerDetails();
        $details = $volunteerModel->retrieve_all();
        return $this->displayListView($details, 'name', 'status', 'Volunteers', 'volunteers', 'volunteer_id');
    }

    public function displayDonors(Request $request, Response $response)
    {
        $donorModel = new DonorDetailsModel();
        $details = $donorModel->retrieve_all();
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