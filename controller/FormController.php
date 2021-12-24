<?php


namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\handlers\AddressValidateHandler;
use app\handlers\AgeValidateHandler;
use app\handlers\FileValidator;
use app\handlers\FileValidateRequest;
use app\handlers\NameValidateHandler;
use app\handlers\ValidateHandler;
use app\handlers\ValidateRequest;

use app\model\DonorApplication;
use app\model\RecipientApplication;

use app\model\VolunteerApplication;
use app\model\fsrApplication;
use app\model\msrApplication;
use app\controller\Application;
use http\Message\Body;

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
//        $this->validateRequests = [];
//        $nameValidateHandler = new NameValidateHandler();
//        $addressValidateHandler = new AddressValidateHandler();
//        $ageValidateHandler = new AgeValidateHandler();
//
//        $nameValidateHandler->setSuccessor($addressValidateHandler);
//        $addressValidateHandler->setSuccessor($ageValidateHandler);
//        $isAllValid = true;
//
//        foreach ($data as $key => $value) {
//            $validateRequest = new ValidateRequest($key, $value);
//            $nameValidateHandler->validateRequest($validateRequest);
//            $data[$key] = $validateRequest->getValue();
//            $isValid = $validateRequest->getIsValid();
//            if ($isValid === false){
//                $this->validateRequests[$key] = $validateRequest;
//                $isAllValid = $isValid;
//            }
//        }
//        return $isAllValid;
        return true;
    }

    public function addVolunteerApplication(Request $request, Response $response)
    {

        //$this->application = new Application();
        if($request->isPost())
        {

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
                $recipientModel = new RecipientApplication();
                $recipientModel->setAttributes($bodyRecipient);

                for ($i = 1; $i <= 5; $i++){

                }

                if ($recipientModel->save()){
                    $recipient_id = $recipientModel->getLastID();
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
                $recipientModel = new RecipientApplication();
                $recipientModel->setAttributes($bodyRecipient);

                for ($i = 1; $i <= 5; $i++){
                    unset($body["need".$i]);
                }

                if ($recipientModel->save()){
                    $recipient_id = $recipientModel->getLastID();
                    $body['recipient_id'] = $recipient_id;
//                    $body['gms_certificate'] =
                    unset($body['gms_certificate']);
                    $fsrModel = new fsrApplication();
                    $fsrModel->setAttributes($body);



                    if($fsrModel->save()){
                        $fileHandler = new FileHandler("uploads/", "fileToUpload");
                        $fsrId = $fsrModel->getLastID();
                        $fileValidateRequest = $fileHandler->getFile($fsrId);
                        if ($fileValidateRequest !== false){
                            if($this->validateFile($fileValidateRequest)){
                                $fileHandler->saveFile();
                            }
                            else {
                                $this->validateRequests["fileToUpload"] = $fileValidateRequest;
                            }
                        }
//                        $response->redirect("http://localhost:8080/confirmation");
//                        exit;
                    }
                }


            }
        }
        return $this->render("fsrApplication", "main");
    }

    public function validateFile(ValidateRequest $fileValidateRequest):bool
    {
        $fileValidator = new FileValidator();
        $fileValidator->validateRequest($fileValidateRequest);
        return $fileValidateRequest->getIsValid();
    }

    public function addAidDonation(Request $request, Response $response)
    {
        return $this->render("aidDonationReq", "main");
    }

}