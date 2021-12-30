<?php
use app\handlers\ValidateRequest;

/*** @var $name */
/*** @var $address */
/*** @var $age */
/*** @var $mobile */
/*** @var $district */
?>

<style>
    <?php include "css/donorProfile.css"?>
</style>

<div class="row">
    <form action="/donorProfile" method="post" class="container form-container col-lg-5 col-md-7 col-9">
        <h2 class="title"><b>Your Details</b></h2>
        <div class="form-group">
            <label for="collect-method" class="input-label"><b>Name</b></label>
            <input class="form-control input-field" id="full-name" name="name" type="text" value="<?php if (isset($name)) echo $name; ?>" readonly>
        </div>

        <div class="form-group" id="address-part">
            <label for="address" class="input-label"><b>Address</b></label>
            <textarea class="form-control input-field" id="address" name="address" aria-describedby="" rows="3" readonly><?php if (isset($name)) echo $address; ?></textarea>
        </div>

        <div class="form-group">
            <label for="collect-method" class="input-label"><b>Age</b></label>
            <input class="form-control input-field" id="age" name="age" type="number" min="1" max="99" value="<?php if (isset($name)) echo $age; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="collect-method" class="input-label"><b>Mobile Number</b></label>
            <input class="form-control input-field" id="mobile" name="mobile" type="tel" value="<?php if (isset($mobile)) echo $name; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="collect-method" class="input-label"><b>District</b></label>
            <input class="form-control input-field" id="district" name="district" type="text" value="<?php if (isset($district)) echo $district; ?>" readonly>
        </div>

        <button type="button" id="edit" class="btn float-right" style="color: #6f42c1; font-weight: bold">Edit</button>
        <div class="text-center py-5">
            <button type="submit" class="btn btn-primary submit-button">Save</button>
        </div>
    </form>

</div>

<script>
    <?php include "js/donorProfile.js"?>
</script>
