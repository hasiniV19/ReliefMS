<?php
use app\core\BoxView;
use app\core\App;

/** @var $boxes */
/** @var $title */
?>

<style>
    <?php include "css/list.css" ?>
</style>
<div class="container">
    <h1 class="title"><?php echo $title?></h1>
    <div class="row">
        <?php foreach ($boxes as $box){
            echo "
                <div class='box-container col-12 col-lg-4 col-md-6'>
                    <div class='box'>
                        <h2 class=''>";
            echo $box->getBoxTitle();

            echo "</h2>";
            $boxStatus = strtolower($box->getBoxStatus());
            if($boxStatus === "medical" || $boxStatus === "approved"){
                echo "<div class='status-bar border border-success text-success'>";
            } else if($boxStatus === "declined"){
                echo "<div class='status-bar border border-danger text-danger'>";
            }else{
                echo "<div class='status-bar border border-warning text-warning'>";
            }
            echo $boxStatus;
            echo        "</div>
                        <a class='link ' href='http://localhost:8080/";
            $userType = App::$app->session->get("user_type");
            $boxType = $box->getBoxType();
            $boxId = $box->getBoxId();
            switch ($boxType){
                case "approvedRecipients":
                    if ($userType === "donor"){
                        if ($boxStatus === "financial") {
                            echo "fsrDetailsDonor?recipient_id=".$boxId;
                        } elseif ($boxStatus === "medical") {
                            echo "msrDetailsDonor?recipient_id=".$boxId;
                        }
                    } elseif ($userType === "admin") {

                        if ($boxStatus === "financial") {
                            echo "approvedFSRDetails?recipient_id=".$boxId;
                        } elseif ($boxStatus === "medical") {
                            echo "approvedMSRDetails?recipient_id=".$boxId;
                        }
                    }
                    break;
                case "msRecipients":
                    if ($userType === "admin") {
                        echo "msrDetailsAdmin?recipient_id=".$boxId;
                    } else // error
                    break;
                case "volunteers":
                    if ($userType === "admin"){
                        echo "volunteerDetails?volunteer_id=".$boxId;
                    }
                    break;
                case "donors":
                    if ($userType === "admin") {
                        echo "donorDetails?donor_id=".$boxId;
                    }
                    break;
                case "fsRecipient":
                    if ($userType === "admin"){
                        echo "fsrDetailsAdmin?recipient_id=".$boxId;
                    }
                    break;
            }

            echo "' >View</a>
                    </div>
                </div>    
            
            ";
        }?>

    </div>
</div>



