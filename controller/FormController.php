<?php


namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\handlers\AddressValidateHandler;
use app\handlers\AgeValidateHandler;
use app\handlers\NameValidateHandler;
use app\handlers\ValidateHandler;
use app\handlers\ValidateRequest;
use app\model\VolunteerApplication;
use app\controller\Application;

class FormController extends Controller
{
    private  array $validateRequests;
    private Application $application;

    public function addApplication(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $body = $request->getBody();
//            echo '<pre>';
//            var_dump($body);
//            echo '</pre>';
//            exit;
            // validate data
            if ($this->validate($body)) {
                $model = new VolunteerApplication();
                $model->setAttributes($body);
                if ($model->save()) {
                    $response->redirect("http://localhost:8080/");
                    exit;
                    echo "saved successfully";
                }
            }


        }

        return $this->render("form", "main");
    }

    public function validate($data): bool
    {
//        var_dump($data);
        $this->validateRequests = [];
        $nameValidateHandler = new NameValidateHandler();
        $addressValidateHandler = new AddressValidateHandler();
        $ageValidateHandler = new AgeValidateHandler();

        $nameValidateHandler->setSuccessor($addressValidateHandler);
        $addressValidateHandler->setSuccessor($ageValidateHandler);
        $isAllValid = true;

        foreach ($data as $key => $value) {
            $validateRequest = new ValidateRequest($key, $value);
            $nameValidateHandler->validateRequest($validateRequest);
            $data[$key] = $validateRequest->getValue();
            $isValid = $validateRequest->getIsValid();
            if ($isValid === false){
                $this->validateRequests[$key] = $validateRequest;
                $isAllValid = $isValid;
            }
        }
        return $isAllValid;
    }

    public function addVolunteerApplication(Request $request, Response $response)
    {
        $this->application = new Application();
        if ($request->isPost()) {
            $body = $request->getBody();
            if ($this->validate($body)) {
                $model = new VolunteerApplication();
                $model->setAttributes($body);
                if ($model->save()) {
                    $response->redirect("http://localhost:8080/confirmation");
                    exit;
                }
            } else {
                var_dump("not valid name");
                return $this->render("volunteerApplication", "main", $this->validateRequests);
            }
        }
        return $this->render("volunteerApplication", "main");
    }

    public function addDonorApplication(Request $request, Response $response)
    {
        return $this->render("donorApplication", "main");
    }

    public function addMSRApplication(Request $request, Response $response)
    {
        return $this->render("msrApplication", "main");
    }

    public function addFSRApplication(Request $request, Response $response)
    {
        if($request->isPost()){


        }
        return $this->render("fsrApplication", "main");
    }

    public function addAidDonation(Request $request, Response $response)
    {
        return $this->render("aidDonationReq", "main");
    }

}