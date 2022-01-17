<?php

/*** @var $receipt_name */
/*** @var $amount */
/*** @var $date */
/*** @var $status */
/*** @var $m_donation_id */

use app\core\App;
use app\view\DateConverter;

?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form method="post" class="container form-container col-lg-6 col-md-8 col-10"  action="/moneyDonationDetails">
        <h2 class="title">Money Donation Details</h2>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="reci-name-title" class="input-title">Receipt Name</label>
            </div>
            <div class=" col-md-7">
                <label for="reci-name" class="input-label" ><a href="<?php echo 'http://localhost:8080/uploadReceipts/';
                if (isset($m_donation_id) && isset($receipt_name)) echo $m_donation_id.$receipt_name;
                ?>"target ="_blank"><?php if (isset($receipt_name)) echo $receipt_name; ?></a></label>
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

