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
}
