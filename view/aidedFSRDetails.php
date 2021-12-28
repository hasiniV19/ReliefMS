<?php

/*** @var $name */
/*** @var $address */
/*** @var $mobile */
/*** @var $no_members */
/*** @var $monthly_income */
/*** @var $gms_certificate */
/*** @var $is_there_students */
/*** @var $no_students */
/*** @var $needs */
/*** @var $date */
/*** @var $status */
?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">Aided FSR Details</h2>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="name-title" class="input-title">Name</label>
            </div>
            <div class=" col-md-7">
                <label for="name" class="input-label"><?php if (isset($name)) echo $name; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="address-title" class="input-title">Address</label>
            </div>
            <div class=" col-md-7">
                <label for="address" class="input-label"><?php if (isset($address)) echo $address; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="mobile-title" class="input-title">Mobile Number</label>
            </div>
            <div class=" col-md-7">
                <label for="mobile" class="input-label"><?php if (isset($mobile)) echo $mobile; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="no-members-title" class="input-title">Number of Family Members</label>
            </div>
            <div class=" col-md-7">
                <label for="no-members" class="input-label"><?php if (isset($no_members)) echo $no_members; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="income-title" class="input-title">Monthly Income</label>
            </div>
            <div class=" col-md-7">
                <label for="income" class="input-label"><?php if (isset($monthly_income)) echo $monthly_income; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="gms-certificate-title" class="input-title">Gramasewaka Certificate</label>
            </div>
            <div class=" col-md-7">
                <label for="gms-certificate" class="input-label"><?php if (isset($gms_certificate)) echo $gms_certificate; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="student-title" class="input-title">Are there any Students?</label>
            </div>
            <div class=" col-md-7">
                <label for="student" class="input-label"><?php if (isset($is_there_students)) echo $is_there_students; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="no-student-title" class="input-title">Number of students</label>
            </div>
            <div class=" col-md-7">
                <label for="no-student" class="input-label"><?php if (isset($no_students)) echo $no_students; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="other-needs-title" class="input-title">Other Needs</label>
            </div>
            <div class=" col-md-7">
                <label for="other-needs" class="input-label"><?php if (isset($needs)) echo $needs; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-5">
                <label for="submitted-date-title" class="input-title">Submitted Date</label>
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


        <div class="text-center" >
            <button type="submit" class="btn btn-primary go-back-button">Go Back</button>
        </div>

    </form>

</div>

