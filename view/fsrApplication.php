<?php
use app\handlers\ValidateRequest;

/*** @var $name */
/*** @var $no_members */
/*** @var $mobile */
/*** @var $monthly_income */
/*** @var $address */
/*** @var $fileToUpload */
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

<form class="container form-container" method="post" action="/fsrApplication" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6 col-sm-12"> <!-- common details -->
            <div class="form-part">
                <h2 class="title">Common Details</h2>
                <div class="form-group">
                    <label for="name" class="input-label">Full Name</label>
                    <input type="text" name="name" class="form-control input-field" placeholder="Enter Your Name" id="name" aria-describedby=""
                           value="<?php if (isset($name)) echo $name->getValue();?>">
                    <span class="err-msg"><?php if (isset($name)) echo $name->getValidError();?></span>
                </div>
                <div class="form-group">
                    <label for="no-members" class="input-label">Number of Family Members</label>
                    <input type="number" name="no_members" class="form-control input-field" placeholder="How many members in your family" min="1" max="6" id="no-members" aria-describedby=""
                           value="<?php if (isset($no_members)) echo $no_members->getValue();?>" required>
                </div>
                <div class="form-group">
                    <label for="mobile" class="input-label">Mobile Number</label>
                    <input type="tel" name="mobile" class="form-control input-field" placeholder="Enter Telephone Number" id="mobile" aria-describedby=""
                           value="<?php if (isset($mobile)) echo $mobile->getValue();?>">
                    <span class="err-msg"><?php if (isset($mobile)) echo $mobile->getValidError();?></span>
                </div>
                <div class="form-group">
                    <label for="address" class="input-label">Address</label>
                    <textarea name="address" class="form-control input-field" placeholder="Enter Address" id="address" aria-describedby="" rows="3"><?php if(isset($address)){echo $address->getValue();} ?></textarea>
                    <span class="err-msg"><?php if (isset($address)) echo $address->getValidError();?></span>

                </div>

            </div>
        </div>

        <div class="col-md-6 col-sm-12"> <!-- financial details -->
            <div class="form-part">
                <h2 class="title">Financial Details</h2>
                <div class="form-group">
                    <label for="income" class="input-label">Monthly Income</label>
                    <input type="text" name="monthly_income" class="form-control input-field" placeholder="Enter Your Monthly Income" id="income" aria-describedby=""
                           value="<?php if (isset($monthly_income)) echo $monthly_income->getValue();?>">
                    <span class="err-msg"><?php if (isset($monthly_income)) echo $monthly_income->getValidError();?></span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1" class="input-label">Gramasewaka Certificate</label>

                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file">
                    <span class="err-msg"><?php if (isset($fileToUpload)) echo $fileToUpload->getValidError();?></span>


                </div>
            </div>

        </div>
    </div>
    <div class="row btm-row">
        <div class="col-md-6 col-sm-12">
            <div>
                <div class="input-label">Are there any students with learning material needs</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input input-field" type="radio" name="is_there_students" id="no" value= 0 checked>
                    <label class="form-check-label input-label" for="inlineRadio1">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input input-field" type="radio" name="is_there_students" id="yes" value= 1>
                    <label class="form-check-label input-label" for="inlineRadio2">Yes</label>
                </div>
            </div>
            <div class="form-group hidden" id="student-details">
                <label for="no-students" class="input-label">Number of Students</label>
                <input type="number" name="no_students" class="form-control input-field" placeholder="How many students in your family" min="1" max="4" id="no-students" aria-describedby=""
                       value="<?php if (isset($no_students)) echo $no_students->getValue();?>">

            </div>
        </div>

        <div class="col-md-6 col-sm-12 row"> <!-- other needs -->
            <label class="col-12 mb-4 input-label" style="color: #ff6666">We provide you package with necessary items </label>
            <label class="col-md-3 input-label mb-3">We provide</label>
            <div class="col-md-9">
                <label for="pack" class="mb-3 font-italic font-weight-bold"><a href="<?php echo 'http://localhost:8080/package/list.pdf';?>"target ="_blank">Relief Pack</a> Other than these things in this list, If you want anything else please mention below.</label>
            </div>

            <label class="col-md-3 input-label">Other Needs</label>


            <div class="col-md-9">

                <div class="form-group">
                    <input name="need1" type="text" class="form-control input-field" placeholder="Enter Your Need" id="" aria-describedby=""
                           value="<?php if (isset($need1)) echo $need1->getValue();?>" >
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