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
}