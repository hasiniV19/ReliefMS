<?php

namespace app\controller;

use app\controller\listView\BoxView;
use app\controller\listView\BoxFactory;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

class ListViewController extends Controller
{
    private BoxFactory $boxViewFactory;

    public function __construct(){}

    public function displayApprReci(Request $request, Response $response)
    {
        $details = [["reciName"=>"Hasini", "reciType"=>"financial"], ["reciName"=>"Dinithi", "reciType"=>"medical"]];
        return $this->displayListView($details, 'reciName', 'reciType', 'Recipients');
    }

    public function displayAidedReci(Request $request, Response $response)
    {
        $details = [["reciName"=>"Hasini", "reciType"=>"financial"], ["reciName"=>"Dinithi", "reciType"=>"medical"]];
        return $this->displayListView($details, 'reciName', 'reciType', 'Aided Recipients');
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

    private function displayListView($details, $boxTitle, $boxStatus, $title){
        $this->boxViewFactory = new BoxFactory();
        $boxes = [];
        foreach ($details as $detail){
            $box = $this->boxViewFactory->getBoxView($detail[$boxTitle], $detail[$boxStatus]);
            $boxes[] = $box;
        }

        return $this->render("listView", "main", ["boxes"=>$boxes, "title"=>$title]);
    }


}