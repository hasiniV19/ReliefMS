<?php
use app\handlers\ValidateRequest;

/*** @var $collecting_method */
/*** @var $station */
/*** @var $address */
?>

<style>
    <?php include "css/aidDonationReq.css"?>
</style>

<div class="row">
    <form method="post" action="/aidDonationRequest" class="container form-container col-lg-5 col-md-7 col-9">
        <h2 class="title">Aid Donation Request</h2>
        <div class="form-group">
            <label for="collect-method" class="input-label">Collecting Method</label>
            <select name="collecting_method" id="collect-method" class="form-control input-field">
<!--                <option selected disabled hidden>Choose here</option>-->
                <option value="station" selected>Station</option>
                <option value="home">Home</option>
            </select>
        </div>

        <!-- stations dropdown -->
        <div class="form-group" id="station-part">
            <label for="station" class="input-label">Station</label>
            <select name="station" id="station" class="form-control input-field">
<!--                <option selected disabled hidden>Choose here</option>-->
                <option value="Galle" selected>Galle</option>
                <option value="Matara">Matara</option>
                <option value="Colombo">Colombo</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Ampara">Ampara</option>
            </select>
        </div>

        <!-- home address -->
        <div class="form-group hidden" id="address-part">
            <label for="address" class="input-label">Address</label>
            <textarea name="address" class="form-control input-field" id="address" aria-describedby="" rows="3" readonly><?php if (isset($address)) echo $address;?></textarea>
            <div class="">
                <button name="edit" type="button" id="edit" class="btn float-right" style="color: #6f42c1; font-weight: bold">Edit</button>
            </div>
        </div>

        <div class="text-center py-5">
            <button type="submit" class="btn btn-primary submit-button">Submit</button>
        </div>
    </form>

</div>

<script>
    <?php include "js/aidDonationReq.js"?>
</script>
