<?php


namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\handlers\AddressValidateHandler;
use app\handlers\AgeValidateHandler;
use app\handlers\DayValidateHandler;
use app\handlers\DefaultValidateHandler;
use app\handlers\DistrictValidateHandler;
use app\handlers\FileValidator;
use app\handlers\FileValidateRequest;
use app\handlers\FinalValidateHandler;
use app\handlers\GenderValidateHandler;
use app\handlers\HaveVehicleValidateHandler;
use app\handlers\IsThereStudentsValidateHandler;
use app\handlers\MobileValidateHandler;
use app\handlers\MonthlyIncomeValidateHandler;
use app\handlers\NameValidateHandler;
use app\handlers\OccupationValidateHandler;
use app\handlers\ValidateHandler;
use app\handlers\ValidateRequest;
use app\model\FsrFileModel;

use app\model\DonorApplication;
use app\model\OtherNeedModel;
use app\model\RaiseFundApplication;
use app\model\RaiseFundFileModel;
use app\model\RecipientApplication;

use app\model\VolunteerApplication;
use app\model\fsrApplication;
use app\model\msrApplication;
use app\controller\Application;
use http\Message\Body;

class FormController extends Controller
{
    private array $validateRequests;
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
        $this->validateRequests = [];
        $nameValidateHandler = new NameValidateHandler();
        $addressValidateHandler = new AddressValidateHandler();
        $ageValidateHandler = new AgeValidateHandler();
        $mobileValidateHandler = new MobileValidateHandler();
        $occupationValidateHandler = new OccupationValidateHandler();
        $districtValidateHandler = new DistrictValidateHandler();
        $monthlyIncomeValidateHandler = new MonthlyIncomeValidateHandler();
        $defaultValidateHandler = new DefaultValidateHandler();
        $finalValidateHandler = new FinalValidateHandler();

        $nameValidateHandler->setSuccessor($addressValidateHandler);
        $addressValidateHandler->setSuccessor($ageValidateHandler);
        $ageValidateHandler->setSuccessor($mobileValidateHandler);
        $mobileValidateHandler->setSuccessor($occupationValidateHandler);
        $occupationValidateHandler->setSuccessor($districtValidateHandler);
        $districtValidateHandler->setSuccessor($monthlyIncomeValidateHandler);
        $monthlyIncomeValidateHandler->setSuccessor($defaultValidateHandler);
        $defaultValidateHandler->setSuccessor($finalValidateHandler);

        $isAllValid = true;

        foreach ($data as $key => $value) {
//            if ($key === "name" || $key === "address" ||$key === "age" ||$key === "mobile" ||$key === "occupation") {
                $validateRequest = new ValidateRequest($key, $value);
                $nameValidateHandler->validateRequest($validateRequest);
                $data[$key] = $validateRequest->getValue();
                $isValid = $validateRequest->getIsValid();
                $this->validateRequests[$key] = $validateRequest;

            if ($isValid === false) {

                $isAllValid = $isValid;
            }

        }
        return $isAllValid;
    }

    public function addVolunteerApplication(Request $request, Response $response)
    {

        //$this->application = new Application();
        if ($request->isPost()) {

            $body = $request->getBody();
            var_dump("valid");
            if ($this->validate($body)) {

                $model = new VolunteerApplication();
                $model->setAttributes($body);
                if ($model->save()) {
                    $response->redirect("http://localhost:8080/confirmation");
                    exit;
                }
            } else {
//                var_dump($this->validateRequests["name"]);
                return $this->render("volunteerApplication", "main", $this->validateRequests);
            }
        }
        return $this->render("volunteerApplication", "main");
    }

    public function addDonorApplication(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $body = $request->getBody();
            //var_dump($body);
            if($this->validate($body)){

                $model = new DonorApplication();
                $model->setAttributes($body);
                if ($model->save()) {
                    $response->redirect("http://localhost:8080/confirmation");
                    exit;
                }
            }
            else{
                return $this->render("donorApplication", "main", $this->validateRequests);
            }
        }

        return $this->render("donorApplication", "main");
    }

    public function addMSRApplication(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $body = $request->getBody();

            if ($this->validate($body)) {
                $bodyRecipient = [];
                $bodyRecipient['recipient_type'] = 'msr';
                $recipientModel = new RecipientApplication();
                $recipientModel->setAttributes($bodyRecipient);

                for ($i = 1; $i <= 5; $i++) {

                }

                if ($recipientModel->save()) {
                    $recipient_id = $recipientModel->getLastID();
                    $body['recipient_id'] = $recipient_id;

                    $msrModel = new msrApplication();
                    $msrModel->setAttributes($body);

                    if ($msrModel->save()) {
                        $response->redirect("http://localhost:8080/confirmation");
                        exit;
                    }
                }

            }
            else{
                return $this->render("msrApplication", "main",  $this->validateRequests);
            }

        }
        return $this->render("msrApplication", "main");
    }

    public function addFSRApplication(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $body = $request->getBody();


            if ($this->validate($body)) {
                $bodyRecipient = [];
                $bodyRecipient['recipient_type'] = 'fsr';
                $recipientModel = new RecipientApplication();
                $recipientModel->setAttributes($bodyRecipient);

                if ($recipientModel->save()) {
                    $recipient_id = $recipientModel->getLastID();
                    $body['recipient_id'] = $recipient_id;
//                    $body['gms_certificate'] =
                    unset($body['gms_certificate']);
                    $fsrModel = new fsrApplication();
                    $fsrModel->setAttributes($body);

                    if ($fsrModel->save()) {
                        $fileHandler = new FileHandler("uploads/", "fileToUpload");
                        $fsrId = $fsrModel->getLastID();
                        $fileValidateRequest = $fileHandler->getFile($fsrId);
                        if ($fileValidateRequest !== false) {
                            if ($this->validateFile($fileValidateRequest)) {
                                $fileHandler->saveFile();
                                $fileModel = new FsrFileModel();
                                $gmsBody = ["fsr_id" => $fsrId, "gms_certificate" => $fileValidateRequest->getValue()->getFileName()];
                                var_dump($gmsBody);
                                $fileModel->setAttributes($gmsBody);
                                if ($fileModel->update()) {
                                    $otherNeedModel = new OtherNeedModel();

                                    for ($i = 1; $i <= 5; $i++) {
                                        if (!empty($body["need".$i])) {
                                            $otherNeedModel->setAttributes(["recipient_id" => $recipient_id, "need" => $body["need" . $i]]);
                                            $otherNeedModel->save();
                                        }
                                        unset($body["need" . $i]);
                                    }
                                    $response->redirect("http://localhost:8080/confirmation");
                                    exit;
                                }
                            } else {
                                $this->validateRequests["fileToUpload"] = $fileValidateRequest;
                            }
                        }
                    }
                }


            }else{
                return $this->render("fsrApplication", "main", $this->validateRequests);
            }
        }
        return $this->render("fsrApplication", "main");
    }

    public function validateFile(ValidateRequest $fileValidateRequest): bool
    {
        $fileValidator = new FileValidator();
        $fileValidator->validateRequest($fileValidateRequest);
        return $fileValidateRequest->getIsValid();
    }

    public function addAidDonation(Request $request, Response $response)
    {
        return $this->render("aidDonationReq", "main");
    }

    public function raiseFundForm(Request $request,Response $response)
    {
        if ($request->isPost()) {
            $body = $request->getBody();

            if ($this->validate($body)) {
                $model = new RaiseFundApplication();
                $model->setAttributes($body);
                if ($model->save()) {
                    $fileHandler = new FileHandler("uploads/", "fileToUpload");
                    $m_donation_id = $model->getLastID();
                    $fileValidateRequest = $fileHandler->getFile($m_donation_id);
                    if ($fileValidateRequest !== false) {
                        if ($this->validateFile($fileValidateRequest)) {
                            $fileHandler->saveFile();
                            $fileModel = new RaiseFundFileModel();
                            $recieptBody = ["m_donation_id" => $m_donation_id, "reciept_name" => $fileValidateRequest->getValue()->getFileName()];
                            var_dump($recieptBody);
                            $fileModel->setAttributes($recieptBody);
                            if ($fileModel->update()) {

                                $response->redirect("http://localhost:8080/confirmation");
                                exit;
                            } else {
                                $this->validateRequests["fileToUpload"] = $fileValidateRequest;
                            }
                        }
                    }
                }
            }else{
                return $this->render("raiseFundForm","main", $this->validateRequests);
            }
        }
        return $this->render("raiseFundForm","main");
    }

}