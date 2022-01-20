<?php
use app\handlers\ValidateRequest;

/*** @var $name */
/*** @var $address */
/*** @var $age */
/*** @var $mobile */
/*** @var $occupation */
/*** @var $available_day */
/*** @var $gender */
/*** @var $have_vehicle */



?>

<style>
    <?php include "css/normalApplication.css"?>
</style>

<div class="row">
    <form method="post" action="/volunteerApplication" class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title py-lg-1 py-sm-8">Volunteer Application</h2>

        <div class="form-group">
            <label for="name" class="input-label">Full Name</label>
            <input name="name" type="text" class="form-control input-field" placeholder="Enter Your Name" id="namebox" aria-describedby=""
                   value="<?php if (isset($name)) echo $name->getValue();?>">

            <span class="err-msg"><?php if (isset($name)) echo $name->getValidError();?></span>


        </div>

        <div class="form-group">
            <label for="address" class="input-label">Address</label>
            <textarea name="address" class="form-control input-field" placeholder="Enter Address" id="address" aria-describedby="" rows="3"><?php if(isset($address)){echo $address->getValue();} ?></textarea>
            <span class="err-msg"><?php if (isset($address)) echo $address->getValidError();?></span>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="input-label">Age</label>
                <input name="age" type="number" class="form-control input-field" placeholder="Enter Age" id="age" min="1" max="99" aria-describedby=""
                       value="<?php if (isset($age)) echo $age->getValue();?>">
                <span class="err-msg"><?php if (isset($age)) echo $age->getValidError();?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="mobile" class="input-label">Mobile Number</label>
                <input name="mobile" type="tel" class="form-control input-field" placeholder="Enter Telephone Number" id="mobile" aria-describedby=""
                       value="<?php if (isset($mobile)) echo $mobile->getValue();?>">
                <span class="err-msg"><?php if (isset($mobile)) echo $mobile->getValidError();?></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="occupation" class="input-label">Occupation</label>
                <input name="occupation" type="text" class="form-control input-field" placeholder="Enter Occupation" id="occupation" aria-describedby=""
                       value="<?php if (isset($occupation)) echo $occupation->getValue();?>">
                <span class="err-msg"><?php if (isset($occupation)) echo $occupation->getValidError();?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="available_day" class="input-label">Available Day</label>
                <select name="available_day" id="inputState" class="form-control input-field" >
<!--                    <option selected disabled hidden>Choose here</option>-->
                    <option value="Sunday" selected <?php if(isset($available_day) && strtolower($available_day->getValue()) == "sunday") echo "selected"?>>Sunday</option>
                    <option value="Monday" <?php if(isset($available_day) && strtolower($available_day->getValue()) == "monday") echo "selected"?>>Monday</option>
                    <option value="Tuesday" <?php if(isset($available_day) && strtolower($available_day->getValue()) == "tuesday") echo "selected"?>>Tuesday</option>
                    <option value="Wednesday" <?php if(isset($available_day) && strtolower($available_day->getValue()) == "wednesday") echo "selected"?>>Wednesday</option>
                    <option value="Thursday" <?php if(isset($available_day) && strtolower($available_day->getValue()) == "thursday") echo "selected"?>>Thursday</option>
                    <option value="Friday" <?php if(isset($available_day) && strtolower($available_day->getValue()) == "friday") echo "selected"?>>Friday</option>
                    <option value="Saturday <?php if(isset($available_day) && strtolower($available_day->getValue()) == "saturday") echo "selected"?>">Saturday</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="gender" class="input-label">Gender</label>
                <div class="form-control input-field" style="height: 4.4rem;">
                    <div class="contact-form-radio ">
                        <input class="input-radio100" id="radio1" type="radio" name="gender" value="Male" checked
                            <?php if(isset($gender) && strtolower($gender->getValue()) == "male") echo "checked"?>>
                        <label class="label-radio100" for="radio1">
                            Male
                        </label>
                    </div>

                    <div class="contact-form-radio">
                        <input class="input-radio100" id="radio2" type="radio" name="gender" value="Female"
                            <?php if(isset($gender) && strtolower($gender->getValue()) == "female") echo "checked"?>>
                        <label class="label-radio100" for="radio2">
                            Female
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="vehicle" class="input-label">Do You Have a Vehicle?</label>
                <div class="form-control input-field" style="height: 4.4rem;">
                    <div class="contact-form-radio ">
                        <input class="input-radio100" id="radio3" type="radio" name="have_vehicle" value=0 checked
                            <?php if(isset($have_vehicle) && $have_vehicle->getValue() == "0") echo "checked"?>>
                        <label class="label-radio100" for="radio3">
                            No
                        </label>
                    </div>

                    <div class="contact-form-radio">
                        <input class="input-radio100" id="radio4" type="radio" name="have_vehicle" value=1
                            <?php if(isset($have_vehicle) && $have_vehicle->getValue() == "1") echo "checked"?>>
                        <label class="label-radio100" for="radio4">
                            Yes
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button name="submit" type="submit" class="btn btn-primary submit-button">Submit</button>
        </div>
    </form>
</div>
