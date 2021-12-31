<?php

/*** @var $receipt_name */
/*** @var $amount */
/*** @var $date */
/*** @var $status */

use app\core\App;
use app\view\DateConverter;

?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">Money Donation Details</h2>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="reci-name-title" class="input-title">Receipt Name</label>
            </div>
            <div class=" col-md-7">
                <label for="reci-name" class="input-label"><?php if (isset($receipt_name)) echo $receipt_name; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="amount-title" class="input-title">Amount</label>
            </div>
            <div class=" col-md-7">
                <label for="amount" class="input-label"><?php if (isset($amount)) echo $amount; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="submitted-date-title" class="input-title">Submitted Date</label>
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
        <!-- <div class="form-row">
          <div class=" col-md-8">
            <label for="-title" class="input-title"></label>
          </div>
          <div class=" col-md-8">
            <label for="" class="input-label"></label>
          </div>
        </div> -->

        <!-- <div class="text-center">
            <button type="submit" class="btn btn-primary submit-button">Submit</button>
        </div> -->

        <div class="form-btn-row form-row text-center">
            <div class="col-md-4 btn-row">
                <a href="<?php echo 'http://localhost:8080/donorDetails?donor_id='.App::$app->session->get('donor_id')?>" class="btn btn-primary submit-button">Go Back</a>
            </div>
            <div class="col-md-4 btn-row ">
                <button type="submit" class="btn btn-danger submit-button">Decline</button>
            </div>
            <div class="col-md-4  btn-row">
                <button type="submit" class="btn btn-success submit-button">Approve</button>
            </div>


        </div>

    </form>

</div>

