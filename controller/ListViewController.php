<?php

namespace app\controller;

use app\core\BoxView;
use app\factory\BoxFactory;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\ListViewModel;
use app\model\RecipientsStatusModel;

class ListViewController extends Controller
{
    private BoxFactory $boxViewFactory;

    public function __construct(){
    }

    public function displayApprReci(Request $request, Response $response)
    {
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
        $details = [["fsReciName"=>"Hasini", "district"=>"Galle"], ["fsReciName"=>"Dinithi", "district"=>"Matara"]];
        return $this->displayListView($details, 'fsReciName', 'district', 'Financial Support Recipients');
    }

    public function displayMSReci(Request $request, Response $response)
    {
        $details = [["msReciName"=>"Hasini", "district"=>"Galle"], ["msReciName"=>"Dinithi", "district"=>"Matara"]];
        return $this->displayListView($details, 'msReciName', 'district', 'Medical Support Recipients');
    }

    public function displayVolunteers(Request $request, Response $response)
    {
        $details = [["volName"=>"Hasini", "status"=>"financial"], ["volName"=>"Dinithi", "status"=>"medical"]];
        return $this->displayListView($details, 'volName', 'status', 'Volunteers');
    }

    public function displayDonors(Request $request, Response $response)
    {
        $details = [["donorName"=>"Hasini", "district"=>"Galle"], ["donorName"=>"Dinithi", "district"=>"Matara"]];
        return $this->displayListView($details, 'donorName', 'district', 'Donors');
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