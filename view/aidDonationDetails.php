<?php

/*** @var $collecting_method */
/*** @var $station */
/*** @var $recipient_id */
/*** @var $date */
/*** @var $status */
/*** @var $name */

use app\core\App;
use app\view\DateConverter;
?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form action="/aidDonationDetails" method="post" class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">Aid Donation Details</h2>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="method-title" class="input-title">Collecting Method</label>
            </div>
            <div class=" col-md-7">
                <label for="method" class="input-label"><?php if (isset($collecting_method)) echo $collecting_method; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="station-title" class="input-title">Station</label>
            </div>
            <div class=" col-md-7">
                <label for="station" class="input-label"><?php if (isset($station)) echo $station; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="recipient-title" class="input-title">Recipient Name</label>
            </div>
            <div class=" col-md-7">
                <label for="recipient" class="input-label"><a href=""><?php if (isset($name)) echo $name; ?></a></label>
            </div>
        </div>


        <div class="form-row">
            <div class=" col-md-5">
                <label for="submit-date-title" class="input-title">Submitted Date</label>
            </div>
            <div class=" col-md-7">
                <label for="submit-date" class="input-label"><?php if (isset($date)) echo DateConverter::convertdate($date); ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="status-title" class="input-title">Status</label>
            </div>
            <div class=" col-md-7">
                <label for="status" class="input-label"><?php if (isset($status)) echo $status; ?></label>
            </div>
        </div>


        <?php if ($status === 'declined' || $status === 'approved'){ ?>
            <div class='text-center' style="padding-top: 2vw">
                <div class=' btn-row'>
                    <a href="<?php echo 'http://localhost:8080/donorDetails?donor_id='.App::$app->session->get('donor_id')?>" class='btn btn-primary submit-button'>Go Back</a>
                </div>
            </div>
        <?php }
        else {?>


            <div class="form-btn-row form-row text-center">
                <div class="col-md-4 btn-row">
                    <a href="<?php echo 'http://localhost:8080/donorDetails?donor_id='.App::$app->session->get('donor_id')?>" class="btn btn-primary submit-button">Go Back</a>
                </div>
                <div class="col-md-4 btn-row ">
                    <button name="decline" type="submit" class="btn btn-danger submit-button">Decline</button>
                </div>
                <div class="col-md-4  btn-row">
                    <button name="approve" type="submit" class="btn btn-success submit-button">Approve</button>
                </div>
            </div>
        <?php } ?>

    </form>

</div>

