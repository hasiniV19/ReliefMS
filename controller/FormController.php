<?php


namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\DonorApplication;
use app\model\RecipientApplication;
use app\model\VolunteerApplication;
use app\model\fsrApplication;
use app\model\msrApplication;
use app\controller\Application;
use http\Message\Body;

class FormController extends Controller
{
    private Application $application;

    public function addApplication(Request $request, Response $response)
    {
        if($request->isPost()){
            $body = $request->getBody();
//            echo '<pre>';
//            var_dump($body);
//            echo '</pre>';
//            exit;
            // validate data
            if($this->validate($body)){
                $model = new VolunteerApplication();
                $model->setAttributes($body);
                if($model->save()){
                    $response->redirect("http://localhost:8080/");
                    exit;
                    echo "saved successfully";
                }
            }


        }

        return $this->render("form", "main");
    }

    public function addVolunteerApplication(Request $request, Response $response)
    {
        //$this->application = new Application();
        if($request->isPost())
        {
            $body = $request->getBody();
            if($this->validate($body)){
                $model = new VolunteerApplication();
                $model->setAttributes($body);
                if($model->save()) {
                    $response->redirect("http://localhost:8080/confirmation");
                    exit;
                }
            }
        }
        return $this->render("volunteerApplication", "main");
    }


    public function addDonorApplication(Request $request, Response $response)
    {
        if($request->isPost())
        {
            $body = $request->getBody();
            var_dump($body);
            if($this->validate($body)){
                $model = new DonorApplication();
                $model->setAttributes($body);
                if($model->save()) {
                    $response->redirect("http://localhost:8080/confirmation");
                    exit;
                }
            }
        }

        return $this->render("donorApplication", "main");
    }

    public function addMSRApplication(Request $request, Response $response)
    {
        if ($request->isPost())
        {
            $body = $request->getBody();

            if($this->validate($body))
            {
                $bodyRecipient = [];
                $bodyRecipient['recipient_type']='msr';
                $resipientModel = new RecipientApplication();
                $resipientModel->setAttributes($bodyRecipient);

                for ($i = 1; $i <= 5; $i++){

                }

                if ($resipientModel->save()){
                    $recipient_id = $resipientModel->getLastID();
                    $body['recipient_id'] = $recipient_id;

                    $msrModel = new msrApplication();
                    $msrModel->setAttributes($body);

                    if($msrModel->save()){
                        $response->redirect("http://localhost:8080/confirmation");
                        exit;
                    }
                }


            }
        }
        return $this->render("msrApplication", "main");
    }

    public function addFSRApplication(Request $request, Response $response)
    {
        if ($request->isPost())
        {
            $body = $request->getBody();

            if($this->validate($body))
            {
                $bodyRecipient = [];
                $bodyRecipient['recipient_type']='fsr';
                $model_1 = new RecipientApplication();
                $model_1->setAttributes($bodyRecipient);

                if ($model_1->save()){
                    //$recipient_id = $model_1->getUserID();
                    $body['recipient_id'] = 13;

                    $model_2 = new fsrApplication();
                    $model_2->setAttributes($body);

                    if($model_2->save()){
                        $response->redirect("http://localhost:8080/confirmation");
                        exit;
                    }
                }


            }
        }
        return $this->render("fsrApplication", "main");
    }

    public function addAidDonation(Request $request, Response $response)
    {
        return $this->render("aidDonationReq", "main");
    }


    public function validate($data):bool
    {
        var_dump($data);
        return true;
    }


}