<?php

/*** @var $name */
/*** @var $address */
/*** @var $age */
/*** @var $gender */
/*** @var $occupation */
/*** @var $available_day */
/*** @var $have_vehicle */
/*** @var $status */
/*** @var $mobile */
/*** @var $date */
?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">Volunteer Details</h2>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="name-title" class="input-title">Name</label>
            </div>
            <div class=" col-md-8">
                <label for="name" class="input-label"><?php if (isset($name)) echo $name; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="address-title" class="input-title">Address</label>
            </div>
            <div class=" col-md-8">
                <label for="address" class="input-label"><?php if (isset($address)) echo $address; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="age-title" class="input-title">Age</label>
            </div>
            <div class=" col-md-8">
                <label for="age" class="input-label"><?php if (isset($age)) echo $age; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="mobile-title" class="input-title">Mobile Number</label>
            </div>
            <div class=" col-md-8">
                <label for="mobile" class="input-label"><?php if (isset($mobile)) echo $mobile; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="occupation-title" class="input-title">Occupation</label>
            </div>
            <div class=" col-md-8">
                <label for="occupation" class="input-label"><?php if (isset($occupation)) echo $occupation; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="available-day-title" class="input-title">Available Day</label>
            </div>
            <div class=" col-md-8">
                <label for="available-day" class="input-label"><?php if (isset($available_day)) echo $available_day; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="gender-title" class="input-title">Gender</label>
            </div>
            <div class=" col-md-8">
                <label for="gender" class="input-label"><?php if (isset($gender)) echo $gender; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="vehicle-title" class="input-title">Have a Vehicle?</label>
            </div>
            <div class=" col-md-8">
                <label for="vehicle" class="input-label"><?php if (isset($have_vehicle)){
                    if ($have_vehicle === 0) echo "No"; else echo "Yes";
                    }?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="submitted-date-title" class="input-title">Submitted Date</label>
            </div>
            <div class=" col-md-8">
                <label for="submit-date" class="input-label"><?php if (isset($date)) echo $date; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="status-title" class="input-title">Status</label>
            </div>
            <div class=" col-md-8">
                <label for="status" class="input-label"><?php if (isset($status)) echo $status; ?></label>
            </div>
        </div>

        <div class="form-btn-row form-row text-center">
            <div class="col-md-4 btn-row ">
                <a href="<?php echo 'http://localhost:8080/volunteers'?>" class="btn btn-primary submit-button">Go Back</a>
            </div>
            <div class="col-md-4 btn-row">
                <button type="submit" class="btn btn-danger submit-button">Decline</button>
            </div>
            <div class="col-md-4  btn-row ">
                <button type="submit" class="btn btn-success submit-button">Approve</button>
            </div>


        </div>

    </form>

</div>
