<?php
?>


<style>
    <?php include "css/ReciApplication.css";?>
</style>

<form class="container form-container" method="post" action="/msrApplication">
    <h2 class="title mt-5 mt-3">Common Details</h2>
    <div class="row">

        <div class="col-md-6 col-sm-12"> <!-- common details -->
            <div class="form-part">

                <div class="form-group">
                    <label for="name" class="input-label">Full Name</label>
                    <input type="text" name="name" class="form-control input-field" placeholder="Enter Your Name" id="name" aria-describedby="">
                </div>
                <div class="form-group">
                    <label for="mobile" class="input-label">Mobile Number</label>
                    <input type="tel" name="mobile" class="form-control input-field" placeholder="Enter Telephone Number" id="mobile" aria-describedby="">
                </div>
                <div class="form-group">
                    <label for="no-members" class="input-label">Number of Covid Patients</label>
                    <input type="number" name="num_quarant_residents" class="form-control input-field" placeholder="How covid patients in your family" min="1" max="6" id="no-patients" aria-describedby="">
                </div>

            </div>
        </div>

        <div class="col-md-6 col-sm-12"> <!-- financial details -->
            <div class="form-part">

                <div class="form-group">
                    <label for="gs-division" class="input-label">Gramasewaka Division</label>
                    <input type="text" name="gs_division" class="form-control input-field" placeholder="Enter Your Gramasewaka Division" id="gs-division" aria-describedby="">
                </div>
                <div class="form-group">
                    <label for="address" class="input-label">Address</label>
                    <textarea name="address" class="form-control input-field" placeholder="Enter Address" id="address" aria-describedby="" rows="3"></textarea>
                </div>
            </div>

        </div>
    </div>

<!--    <div class="row hidden" id="patient-forms">-->
<!---->
<!--    </div>-->
    <div class="row btm-row">
        <div class="col-md-6 col-sm-12">
            <div>
                <div class="input-label">Are there any students with learning material needs</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input input-field" type="radio" name="is_there_students" id="yes" value="1">
                    <label class="form-check-label input-label" for="inlineRadio1">yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input input-field" type="radio" name="is_there_students" id="no" value="0">
                    <label class="form-check-label input-label" for="inlineRadio2">no</label>
                </div>
            </div>
            <div class="form-group hidden" id="student-details">
                <label for="no-students" class="input-label">Number of Students</label>
                <input type="number" name="no_students" class="form-control input-field" placeholder="How many students in your family" min="1" max="4" id="no-members" aria-describedby="">
            </div>
        </div>

<!--        <div class="col-md-6 col-sm-12 row"> <!-- other needs -->-->
<!--            <label class="col-12 mb-4 input-label" style="color: #ff6666">We provide you package with necessary items </label>-->
<!--            <label class="col-md-3 input-label">Other Needs</label>-->
<!--            <div class="col-md-9">-->
<!--                <div class="form-group">-->
<!--                    <input type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby="">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby="">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary submit-button">Submit</button>
    </div>
</form>

<script>
    <?php include "js/addStudents.js"; ?>
</script>
<script>
    <?php include "js/addPatientForm.js"; ?>
</script>