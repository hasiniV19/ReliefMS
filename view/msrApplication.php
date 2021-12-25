<?php
use app\handlers\ValidateRequest;
/*** @var $name */
/*** @var $mobile */
/*** @var $num_quarant_residents */
/*** @var $gs_division */
/*** @var $address */
/*** @var $is_there_students */
/*** @var $no_students */
/*** @var $need1 */
/*** @var $need2 */
/*** @var $need3 */
/*** @var $need4 */
/*** @var $need5 */

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
                    <input type="text" name="name" class="form-control input-field" placeholder="Enter Your Name" id="name" aria-describedby=""
                           value="<?php if (isset($name)) echo $name->getValue();?>">
                    <span class="err-msg"><?php if (isset($name)) echo $name->getValidError();?></span>
                </div>
                <div class="form-group">
                    <label for="mobile" class="input-label">Mobile Number</label>
                    <input type="tel" name="mobile" class="form-control input-field" placeholder="Enter Telephone Number" id="mobile" aria-describedby=""
                           value="<?php if (isset($mobile)) echo $mobile->getValue();?>">
                    <span class="err-msg"><?php if (isset($mobile)) echo $mobile->getValidError();?></span>
                </div>
                <div class="form-group">
                    <label for="no-members" class="input-label">Number of Covid Patients</label>
                    <input type="number" name="num_quarant_residents" class="form-control input-field" placeholder="How covid patients in your family" min="1" max="6" id="no-patients" aria-describedby=""
                           value="<?php if (isset($num_quarant_residents)) echo $num_quarant_residents->getValue();?>" required>
                </div>

            </div>
        </div>

        <div class="col-md-6 col-sm-12"> <!-- financial details -->
            <div class="form-part">

                <div class="form-group">
                    <label for="gs-division" class="input-label">Gramasewaka Division</label>
                    <input type="text" name="gs_division" class="form-control input-field" placeholder="Enter Your Gramasewaka Division" id="gs-division" aria-describedby=""
                           value="<?php if (isset($gs_division)) echo $gs_division->getValue();?>">
                    <span class="err-msg"><?php if (isset($gs_division)) echo $gs_division->getValidError();?></span>
                </div>

                <div class="form-group">
                    <label for="address" class="input-label">Address</label>
                    <textarea name="address" class="form-control input-field" placeholder="Enter Address" id="address" aria-describedby="" rows="3"><?php if(isset($address)){echo $address->getValue();} ?></textarea>
                    <span class="err-msg"><?php if (isset($address)) echo $address->getValidError();?></span>
                </div>
            </div>

        </div>
    </div>

    <div class="row hidden" id="patient-forms">

    </div>
    <div class="row btm-row">
        <div class="col-md-6 col-sm-12">
            <div>
                <div class="input-label">Are there any students with learning material needs</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input input-field" type="radio" name="is_there_students" id="no" value=0 checked
                        <?php if(isset($is_there_students) && $is_there_students->getValue() == "0") echo "checked"?>>
                    <label class="form-check-label input-label" for="inlineRadio1">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input input-field" type="radio" name="is_there_students" id="yes" value=1
                        <?php if(isset($is_there_students) && $is_there_students->getValue() == "1") echo "checked"?>>
                    <label class="form-check-label input-label" for="inlineRadio2">Yes</label>
                </div>
            </div>
            <div class="form-group hidden" id="student-details">
                <label for="no-students" class="input-label">Number of Students</label>
                <input type="number" name="no_students" class="form-control input-field" placeholder="How many students in your family" min="1" max="4" id="no-students" aria-describedby=""
                       value="<?php if (isset($no_students)) echo $no_students->getValue();?>">
            </div>
        </div>

        <div class="col-md-6 col-sm-12 row">
            <label class="col-12 mb-4 input-label" style="color: #ff6666">We provide you package with necessary items </label>
            <label class="col-md-3 input-label">Other Needs</label>
            <div class="col-md-9">
                <div class="form-group">
                    <input name="need1" type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby=""
                           value="<?php if (isset($need1)) echo $need1->getValue();?>">
                    <span class="err-msg"><?php if (isset($need1)) echo $need1->getValidError();?></span>
                </div>
                <div class="form-group">
                    <input name="need2" type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby=""
                           value="<?php if (isset($need2)) echo $need2->getValue();?>">
                    <span class="err-msg"><?php if (isset($need2)) echo $need2->getValidError();?></span>
                </div>
                <div class="form-group">
                    <input name="need3" type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby=""
                           value="<?php if (isset($need3)) echo $need3->getValue();?>">
                    <span class="err-msg"><?php if (isset($need3)) echo $need3->getValidError();?></span>
                </div>
                <div class="form-group">
                    <input name="need4" type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby=""
                           value="<?php if (isset($need4)) echo $need4->getValue();?>">
                    <span class="err-msg"><?php if (isset($need4)) echo $need4->getValidError();?></span>
                </div>
                <div class="form-group">
                    <input name="need5" type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby=""
                           value="<?php if (isset($need5)) echo $need5->getValue();?>">
                    <span class="err-msg"><?php if (isset($need5)) echo $need5->getValidError();?></span>
                </div>
            </div>
        </div>
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