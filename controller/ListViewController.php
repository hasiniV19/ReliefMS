<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

class ListViewController extends Controller
{
    public function displayApprReci(Request $request, Response $response)
    {
        return $this->render("approvedRecipients", "main");
    }

    public function displayAidedReci(Request $request, Response $response)
    {
        return $this->render("aidedRecipients", "main");
    }

    public function displayFSReci(Request $request, Response $response)
    {
        return $this->render("fsRecipients", "main");
    }

    public function displayMSReci(Request $request, Response $response)
    {
        return $this->render("msRecipients", "main");
    }

    public function displayVolunteers(Request $request, Response $response)
    {
        return $this->render("volunteerList", "main");
    }

    public function displayDonors(Request $request, Response $response)
    {
        return $this->render("donors", "main");
    }


}