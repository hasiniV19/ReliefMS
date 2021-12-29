<?php

/*** @var $collecting_method */
/*** @var $station */
/*** @var $recipient_id */
/*** @var $date */
/*** @var $status */

?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10">
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
                <label for="recipient-title" class="input-title">Recipient</label>
            </div>
            <div class=" col-md-7">
                <label for="recipient" class="input-label"><a href=""><?php if (isset($recipient_id)) echo $recipient_id; ?></a></label>
            </div>
        </div>


        <div class="form-row">
            <div class=" col-md-5">
                <label for="submit-date-title" class="input-title">Submitted Date</label>
            </div>
            <div class=" col-md-7">
                <label for="submit-date" class="input-label"><?php if (isset($date)) echo $date; ?></label>
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


        <div class="form-btn-row form-row text-center">
            <div class="col-md-4 btn-row">
                <button type="submit" class="btn btn-primary submit-button">Go Back</button>
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

