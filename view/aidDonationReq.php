<?php
use app\handlers\ValidateRequest;

/*** @var $collecting_method */
/*** @var $station */
/*** @var $addressOriginal */
/*** @var $address */
?>

<style>
    <?php include "css/aidDonationReq.css"?>
</style>

<div class="row">
    <form method="post" action="/aidDonationRequest" class="container form-container col-lg-5 col-md-7 col-9">
        <h2 class="title">Aid Donation Request</h2>
        <div class="form-group">
            <label for="collect-method" class="input-label">Collecting Method *</label>
            <select name="collecting_method" id="collect-method" class="form-control input-field">
<!--                <option selected disabled hidden>Choose here</option>-->
                <option value="home" selected>Home</option>
                <option value="station">Station</option>

            </select>
        </div>

        <!-- stations dropdown -->
        <div class="form-group hidden" id="station-part">
            <label for="station" class="input-label">Station *</label>
            <select name="station" id="station" class="form-control input-field">
<!--                <option selected disabled hidden>Choose here</option>-->
                <option value="Galle" selected>Galle</option>
                <option value="Matara">Matara</option>
                <option value="Colombo">Hambanthota</option>
            </select>
        </div>

        <!-- home address -->
        <div class="form-group" id="address-part">
            <label for="address" class="input-label">Address *</label>
            <textarea name="address" class="form-control input-field" id="address" aria-describedby="" rows="3" readonly><?php
                if (isset($address)) {
                    echo $address->getValue();
                }
                elseif (isset($addressOriginal)) {
                    echo $addressOriginal;
                }?></textarea>
            <span class="err-msg"><?php if (isset($address)) echo $address->getValidError();?></span>
            <div class="">
                <button name="edit" type="button" id="edit" class="btn float-right" style="color: #6f42c1; font-weight: bold">Edit</button>
            </div>
        </div>
        <div class="mt-5">
            <h4 style="color: #6f42c1">Our Stations,</h4>
        </div>
        <div class="row mt-3">

            <div class="col-md-6 col-lg-6 col-12">
                <div class="f-margin py-2">
                    <h5>Galle Station</h5>
                    30/1, Colombo Road, Galle.
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12">
                <div class="f-margin py-2">
                    <h5>Matara Station</h5>
                    25/4, Nupe Road, Matara.
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-12">
                <div class="f-margin py-2">
                    <h5>Hambanthota Station</h5>
                    30/1, Tangalle Road, Hambanthota.
                </div>
            </div>
        </div>
<!--        <div class="row">-->
<!--            <div class="container col-lg-4 col-md-4 col-12">34/1, Colombo road, Galle</div>-->
<!--            <div class="container col-lg-4 col-md-4 col-12">34/1, Colombo road, Galle</div>-->
<!--            <div class="container col-lg-4 col-md-4 col-12">34/1, Colombo road, Galle</div>-->
<!--        </div>-->
        <div class="text-center py-5">
            <button type="submit" class="btn btn-primary submit-button">Submit</button>
        </div>
    </form>

</div>

<script>
    <?php include "js/aidDonationReq.js"?>
</script>
