<?php


namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\model\VolunteerApplication;

class FormController extends Controller
{

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
        return $this->render("fsrApplication", "main");
    }
    public function validate($data):bool
    {
        var_dump($data);
        return true;
    }


}