<?php


namespace app\controller;

use app\core\App;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\handlers\AddressValidateHandler;
use app\handlers\AgeValidateHandler;
use app\handlers\DayValidateHandler;
use app\handlers\GSDivisionValidateHandler;
use app\handlers\DistrictValidateHandler;
use app\handlers\FileValidator;
//use app\handlers\FileValidateRequest;
use app\handlers\FinalValidateHandler;
use app\handlers\GenderValidateHandler;
use app\handlers\HaveVehicleValidateHandler;
use app\handlers\IsThereStudentsValidateHandler;
use app\handlers\MobileValidateHandler;
use app\handlers\MonthlyIncomeValidateHandler;
use app\handlers\NameValidateHandler;
use app\handlers\OccupationValidateHandler;
use app\handlers\OtherNeedValidateHandler;
use app\handlers\ValidateHandler;
use app\handlers\ValidateRequest;
use app\model\AidDonationModel;
use app\model\DonationDeleteModel;
use app\model\DonationModel;
use app\model\DonorDetailsModel;
use app\model\DonorModel;
use app\model\FsRecipientDeleteModel;
use app\model\FsrFileModel;

use app\model\DonorApplication;
use app\model\MoneyDonationDeleteModel;
use app\model\OtherNeedModel;
use app\model\QuarantResidents;

use app\model\RaiseFundApplication;
use app\model\RaiseFundFileModel;
use app\model\RecipientApplication;

use app\model\RecipientDeleteModel;
use app\model\VolunteerApplicationModel;
use app\model\fsrApplication;
use app\model\msrApplication;
use app\controller\Application;
use http\Message\Body;

class FormController extends Controller
{
    private array $validateRequests;
//    private Application $application;

    private AuthController $authController;

    public function __construct()
    {
        $this->authController = new AuthController();
    }

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
                $model = new VolunteerApplicationModel();
                $model->setAttributes($body);
                if ($model->save()) {
                    $response->redirect("http://localhost:8080/");
                    exit;
                }
            }
        }

        return $this->render("form", "main");
    }

    public function updateDonorProfile(Request $request, Response $response)
    {
        $this->authController->authenticate(["donor"]);


        $user_id = App::$app->session->get("user_id");
        $donorModel = new DonorModel();
        $donorModel->setAttributes(["user_id"=>$user_id]);
        $donorDetails = $donorModel->retrieve();

        foreach ($donorDetails as $key=>$value){
            $this->validateRequests[$key] = new ValidateRequest($key, $value);
        }
        if ($request->isPost()) {
            $body = $request->getBody();
            //var_dump($body);
            $body["user_id"] = App::$app->session->get("user_id");
            if($this->validate($body)){

                $model = new DonorApplication();
                $model->setAttributes($body);
                if ($model->update()) {
                    App::$app->session->setFlash("success","Your profile has been updated Successfully &#10003;");
                    $response->redirect("http://localhost:8080/donorHome");
                    exit;
                }
            }
            else{
                return $this->render("donorProfile", "main", $this->validateRequests);
            }
        }


        return $this->render("donorProfile", "main", $this->validateRequests);
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
        $gSDivisionValidateHandler = new GSDivisionValidateHandler();
        $otherNeedValidateHandler = new OtherNeedValidateHandler();
        $finalValidateHandler = new FinalValidateHandler();

        $nameValidateHandler->setSuccessor($addressValidateHandler);
        $addressValidateHandler->setSuccessor($ageValidateHandler);
        $ageValidateHandler->setSuccessor($mobileValidateHandler);
        $mobileValidateHandler->setSuccessor($occupationValidateHandler);
        $occupationValidateHandler->setSuccessor($districtValidateHandler);
        $districtValidateHandler->setSuccessor($monthlyIncomeValidateHandler);
        $monthlyIncomeValidateHandler->setSuccessor($gSDivisionValidateHandler);
        $gSDivisionValidateHandler->setSuccessor($otherNeedValidateHandler);
        $otherNeedValidateHandler->setSuccessor($finalValidateHandler);

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
//            var_dump("valid");
            if ($this->validate($body)) {

                $model = new VolunteerApplicationModel();
                $model->setAttributes($body);
                if ($model->save()) {
                    App::$app->session->set("app_state", "completed");
                    $response->redirect("http://localhost:8080/thankYou");
                    exit;
                }
            } else {
//                var_dump($this->validateRequests["name"]);
                return $this->render("volunteerApplication", "main", $this->validateRequests);
            }
        }
        App::$app->session->set("app_state", "progress");
        return $this->render("volunteerApplication", "main");
    }

    public function addDonorApplication(Request $request, Response $response)
    {
        $this->authController->authenticate(["donor"]);


        if ($request->isPost()) {
            $body = $request->getBody();
            //var_dump($body);
            $body["user_id"] = App::$app->session->get("user_id");
            if($this->validate($body)){

                $model = new DonorApplication();
                $model->setAttributes($body);
                if ($model->save()) {
                    App::$app->session->setFlash("success","Your Application was Successfully Submitted");
                    App::$app->session->set("donor_state", "registered");
                    App::$app->session->set("app_state", "completed");
                    $response->redirect("http://localhost:8080/donorHome");
                    exit;
                }
            }
            else{
                return $this->render("donorApplication", "main", $this->validateRequests);
            }
        }
        App::$app->session->set("app_state", "progress");
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

                if ($recipientModel->save()) {
                    $recipient_id = $recipientModel->getLastID();
                    $body['recipient_id'] = $recipient_id;

                    $msrModel = new msrApplication();
                    $msrModel->setAttributes($body);

                    if ($msrModel->save()) {
                        $msrId = $msrModel->getLastID();
                        $qrModel = new QuarantResidents();
                        $otherNeedModel = new OtherNeedModel();

                        $numQResidents = $this->validateRequests["num_quarant_residents"]->getValue();

                        for ($i = 1; $i <= $numQResidents; $i++){
                            $data = ["name"=>$body["nameOfPatient".$i], "msr_id"=>(int)$msrId, "age"=>(int)$body["ageOfPatient".$i], "gender"=>$body["gender".$i], "covid_status"=>$body["covid_status".$i]];
                            $qrModel->setAttributes($data);
                            $qrModel->save();
                        }

                        for ($i = 1; $i <= 5; $i++) {
                            if (!empty($body["need".$i])) {
                                $otherNeedModel->setAttributes(["recipient_id" => $recipient_id, "need" => $body["need" . $i]]);
                                $otherNeedModel->save();
                            }
                            unset($body["need" . $i]);
                        }

                        App::$app->session->set("app_state", "completed");
                        $response->redirect("http://localhost:8080/confirmation");
                        exit;
                    }
                }

            }
            else{
                return $this->render("msrApplication", "main",  $this->validateRequests);
            }

        }
        App::$app->session->set("app_state", "progress");
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
                        $this->validateRequests["fileToUpload"] = $fileValidateRequest;
                        if ($fileValidateRequest->getIsValid() !== false) {
                            if ($this->validateFile($fileValidateRequest)) {
                                $fileHandler->saveFile();
                                $fileModel = new FsrFileModel();
                                $gmsBody = ["fsr_id" => $fsrId, "gms_certificate" => $fileValidateRequest->getValue()->getFileName()];
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
                                    App::$app->session->set("app_state", "completed");
                                    $response->redirect("http://localhost:8080/confirmation");
                                    exit;
                                }
                            } else {
                                $fSRecipientDeleteModel = new FsRecipientDeleteModel();
                                $fSRecipientDeleteModel->setAttributes(["fsr_id"=>$fsrId]);
                                $fSRecipientDeleteModel->delete();

                                $recipientDeleteModel = new RecipientDeleteModel();
                                $recipientDeleteModel->setAttributes(['recipient_id'=>$recipient_id]);
                                $recipientDeleteModel->delete();
                                return $this->render("fsrApplication", "main", $this->validateRequests);
                            }
                        } else {
                            $fSRecipientDeleteModel = new FsRecipientDeleteModel();
                            $fSRecipientDeleteModel->setAttributes(["fsr_id"=>$fsrId]);
                            $fSRecipientDeleteModel->delete();

                            $recipientDeleteModel = new RecipientDeleteModel();
                            $recipientDeleteModel->setAttributes(['recipient_id'=>$recipient_id]);
                            $recipientDeleteModel->delete();
                            return $this->render("fsrApplication", "main", $this->validateRequests);
                        }
                    }
                }


            }else{
                return $this->render("fsrApplication", "main", $this->validateRequests);
            }
        }
        App::$app->session->set("app_state", "progress");
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
        $this->authController->authenticate(["donor"]);


        $user_id = App::$app->session->get("user_id");
        $donorModel = new DonorModel();
        $donorModel->setAttributes(["user_id"=>$user_id]);
        $donorDetails = $donorModel->retrieve();
        $donorId = $donorDetails["donor_id"];
        $address = $donorDetails["address"];

        if ($request->isPost()){
            $body = $request->getBody();
                $collectingMethod = $body["collecting_method"];
                if ($collectingMethod === "station"){
                    $donationModel = new DonationModel();
                    $donationModel->setAttributes(["donor_id"=>$donorId, "donation_type"=>"aid"]);
                    if ($donationModel->save()){
                        $donationId = $donationModel->getLastID();
                        $recipientId = (int) App::$app->session->get("recipient_id");
                        $aidDonationModel = new AidDonationModel();
                        $aidDonationDetails = ["donation_id"=>$donationId, "recipient_id"=>$recipientId,
                            "collecting_method"=>"station", "station"=>$body["station"]];
                        $aidDonationModel->setAttributes($aidDonationDetails);
                        if ($aidDonationModel->save()){
//                            App::$app->session->set("app_state", "completed");
                            App::$app->session->setFlash("aidDonationSuccess",
                                "Thank You for Agreeing to Help this Person &#10084; We are grateful for your contribution!");
                            $response->redirect("http://localhost:8080/approvedRecipients");
                        }
                    }

                } elseif ($collectingMethod === "home") {
                    if ($this->validate($body)) {
                        $donationModel = new DonationModel();
                        $donationModel->setAttributes(["donor_id"=>$donorId, "donation_type"=>"aid"]);
                        if ($donationModel->save()){
                            $donationId = $donationModel->getLastID();
                            $recipientId = (int) App::$app->session->get("recipient_id");
                            $aidDonationModel = new AidDonationModel();
                            $aidDonationDetails = ["donation_id"=>$donationId, "recipient_id"=>$recipientId,
                                "collecting_method"=>"home", "station"=>$body["address"]];
                            $aidDonationModel->setAttributes($aidDonationDetails);
                            if ($aidDonationModel->save()) {
//                                App::$app->session->set("app_state", "completed");
                                App::$app->session->setFlash("aidDonationSuccess",
                                    "Thank You for Agreeing to Help this Person &#10084; We are grateful for your contribution!");
                                $response->redirect("http://localhost:8080/approvedRecipients");
                            }
                        }
                    }
                    else {
                        return $this->render("aidDonationReq","main", $this->validateRequests);
                    }

            }

        }
//        App::$app->session->set("app_state", "progress");
        return $this->render("aidDonationReq", "main", ["addressOriginal"=>$address]);
    }


    public function raiseFundForm(Request $request,Response $response)
    {
        $this->authController->authenticate(["donor"]);

        if ($request->isPost()) {
            $body = $request->getBody();

            if ($this->validate($body)) {

                $user_id = App::$app->session->get("user_id");
                $donorModel = new DonorModel();
                $donorModel->setAttributes(["user_id"=>$user_id]);
                $donorDetails = $donorModel->retrieve();
                $donorId = $donorDetails["donor_id"];

                $donationModel = new DonationModel();
                $donationModel->setAttributes(["donor_id"=>$donorId, "donation_type"=>"money"]);
                if ($donationModel->save()){
                    $donationId = $donationModel->getLastID();
                    $moneyDonation = ["donation_id"=>$donationId, "amount"=>$body["amount"]];
                    $model = new RaiseFundApplication();
                    $model->setAttributes($moneyDonation);

                    // save money donation to database and get uploaded file
                    if ($model->save()) {
                        $mDonationId = $model->getLastID();
                        $fileHandler = new FileHandler("uploadReceipts/", "fileToUpload");
                        $fileValidateRequest = $fileHandler->getFile($mDonationId);

                        if (!$fileValidateRequest->getIsValid())
                            $fileValidateRequest->setValidError("*Please Upload your receipt");

                        $this->validateRequests["fileToUpload"] = $fileValidateRequest;
                        if ($fileValidateRequest->getIsValid() !== false) {
                            if ($this->validateFile($fileValidateRequest)){
                                $fileHandler->saveFile(); // save file to local directory
                                $raiseFundFileModel = new RaiseFundFileModel();
                                $raiseFileBody = ["receipt_name"=>$fileValidateRequest->getValue()->getFileName(), "m_donation_id"=>$mDonationId];
                                $raiseFundFileModel->setAttributes($raiseFileBody);
                                if ($raiseFundFileModel->update()) {
                                    App::$app->session->setFlash("success",
                                        "We are grateful for your contribution &#10084;");
                                    $response->redirect("http://localhost:8080/donorHome");
                                    exit;
                                }
                            }
                            else {
                                $mDonationDeleteModel = new MoneyDonationDeleteModel();
                                $mDonationDeleteModel->setAttributes(["m_donation_id"=>$mDonationId]);
                                $mDonationDeleteModel->delete();

                                $donationDeleteModel = new DonationDeleteModel();
                                $donationDeleteModel->setAttributes(["donation_id"=>$donationId]);
                                $donationDeleteModel->delete();
                                return $this->render("raiseFundForm","main", $this->validateRequests);
                            }
                        }
                        else {
                            $mDonationDeleteModel = new MoneyDonationDeleteModel();
                            $mDonationDeleteModel->setAttributes(["m_donation_id"=>$mDonationId]);
                            $mDonationDeleteModel->delete();

                            $donationDeleteModel = new DonationDeleteModel();
                            $donationDeleteModel->setAttributes(["donation_id"=>$donationId]);
                            $donationDeleteModel->delete();
                            return $this->render("raiseFundForm","main", $this->validateRequests);
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