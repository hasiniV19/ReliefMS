<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\VolunteerApplication;

class DisplayController extends Controller{
    public function displayDonorDetails(Request $request, Response $response)
    {
        return $this->render("donorDetails", "main");
    }

    public function displayVolunteerDetails(Request $request, Response $response)
    {
        return $this->render("volunteerDetails", "main");
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
        return $this->render("fsrDetailsAdmin", "main");
    }

    public function displayFSRDetailsDonor(Request $request, Response $response)
    {
        return $this->render("fsrDetailsDonor", "main");
    }

    public function displayMSRDetailsAdmin(Request $request, Response $response)
    {
        return $this->render("msrDetailsAdmin", "main");
    }

    public function displayMSRDetailsDonor(Request $request, Response $response)
    {
        return $this->render("msrDetailsDonor", "main");
    }

    public function displayMoneyDonationDetails(Request $request, Response $response)
    {
        return $this->render("moneyDonationDetails", "main");
    }

    public function displayAidDonationDetails(Request $request, Response $response)
    {
        return $this->render("aidDonationDetails", "main");
    }

    public function displayApprovedMSRDetails(Request $request, Response $response)
    {
        return $this->render("approvedMSRDetails", "main");
    }

    public function displayApprovedFSRDetails(Request $request, Response $response)
    {
        return $this->render("approvedFSRDetails", "main");
    }

    public function displayAidedMSRDetails(Request $request, Response $response)
    {
        return $this->render("aidedMSRDetails", "main");
    }

    public function displayAidedFSRDetails(Request $request, Response $response)
    {
        return $this->render("aidedFSRDetails", "main");
    }
}
