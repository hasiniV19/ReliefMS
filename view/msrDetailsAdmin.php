<?php

/*** @var $name */
/*** @var $address */
/*** @var $mobile */
/*** @var $gs_division */
/*** @var $num_quarant_residents */
/*** @var $is_there_students */
/*** @var $no_students */
/*** @var $needs */
/*** @var $date */
/*** @var $status */
/*** @var $quarantResidents */
?>

<style>
    <?php include "css/Details.css"?>
</style>

<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">MSR Details</h2>

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
                <label for="gs-division-title" class="input-title">Grama Niladari Division</label>
            </div>
            <div class=" col-md-7">
                <label for="gs-division" class="input-label"><?php if (isset($gs_division)) echo $gs_division; ?></label>
            </div>
        </div>

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
                <label for="student" class="input-label"><?php if (isset($is_there_students)) {
                    if ($is_there_students == 0) echo "No";
                    else echo "Yes";
                }?></label>
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

        <hr class="mb-4">
        <h5 class="res-title">Patients Details</h5>
        <div class="row">
            <?php if (isset($quarantResidents)) {
                        foreach ($quarantResidents as $quarantResident){
                            echo '
            <div class="form-2 col-md-6">
                <div class="f-margin">
                    <div class="form-row">
                        <div class=" col-md-5">
                            <label for="res-name-title" class="input-title">Name</label>
                        </div>
                        <div class=" col-md-7">
                            <label for="res-name" class="input-label">';
                            echo $quarantResident["name"];
                            echo '</label>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class=" col-md-5">
                            <label for="res-age-title" class="input-title">Age</label>
                        </div>
                        <div class=" col-md-7">
                            <label for="res-age" class="input-label">';
                            echo $quarantResident["age"];
                            echo '</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class=" col-md-5">
                            <label for="res-gender-title" class="input-title">Gender</label>
                        </div>
                        <div class=" col-md-7">
                            <label for="res-gender" class="input-label">';
                            echo $quarantResident["gender"];
                            echo '</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class=" col-md-5">
                            <label for="covid-status-title" class="input-title">Covid Status</label>
                        </div>
                        <div class=" col-md-7">
                            <label for="covid-status" class="input-label">';
                            echo $quarantResident["covid_status"];
                            echo '</label>
                        </div>
                    </div>

                </div>
            </div>



       
                            ';
                        }
                    }
                    ?>





                </div>





        <div class="form-btn-row form-row text-center">
            <div class="col-md-4 btn-row">
                <a href="<?php echo 'http://localhost:8080/msRecipients'?>" class="btn btn-primary submit-button">Go Back</a>
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
