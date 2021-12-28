<?php

/*** @var $num_quarant_residents */
/*** @var $is_there_students */
/*** @var $no_students */
/*** @var $needs */

?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">MSR Details</h2>

<!--        <div class="form-row">-->
<!--            <div class=" col-md-5">-->
<!--                <label for="name-title" class="input-title">Name</label>-->
<!--            </div>-->
<!--            <div class=" col-md-7">-->
<!--                <label for="name" class="input-label">Piyumi Chan Mahaarachchi</label>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="form-row">-->
<!--            <div class=" col-md-5">-->
<!--                <label for="address-title" class="input-title">Address</label>-->
<!--            </div>-->
<!--            <div class=" col-md-7">-->
<!--                <label for="address" class="input-label">Pawani, Middle Lane, Ella Road, Kurundugaha, Elpitiya</label>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="form-row">-->
<!--            <div class=" col-md-5">-->
<!--                <label for="mobile-title" class="input-title">Mobile Number</label>-->
<!--            </div>-->
<!--            <div class=" col-md-7">-->
<!--                <label for="mobile" class="input-label">0765867087</label>-->
<!--            </div>-->
<!--        </div>-->

        <div class="form-row">
            <div class=" col-md-5">
                <label for="no-members-title" class="input-title">Number of Covid Patients</label>
            </div>
            <div class=" col-md-7">
                <label for="members" class="input-label"><?php if (isset($num_quarant_residents)) echo $num_quarant_residents; ?></label>
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
            <div class="col-md-6 btn-row " id="btn-1">
                <button type="submit" class="btn btn-primary submit-button">Go Back</button>
            </div>

            <div class="col-md-6  btn-row" id="btn-2">
                <button type="submit" class="btn btn-success submit-button">Help</button>
            </div>


        </div>

    </form>

</div>
