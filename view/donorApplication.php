<?php
use app\handlers\ValidateRequest;

/*** @var $name */
/*** @var $address */
/*** @var $age */
/*** @var $mobile */
/*** @var $district */
?>

<style>
    <?php include "css/normalApplication.css"?>
</style>

<div class="row">
    <form method="post" action="/donorApplication" class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">Donor Application</h2>

        <div class="form-group">
            <label for="name" class="input-label">Full Name *</label>
            <input type="text" name="name" class="form-control input-field" placeholder="Enter Your Name" id="name" aria-describedby=""
                   value="<?php if (isset($name)) echo $name->getValue();?>">
            <span class="err-msg"><?php if (isset($name)) echo $name->getValidError();?></span>
        </div>

        <div class="form-group">
            <label for="address" class="input-label">Address *</label>
            <textarea name="address" class="form-control input-field" placeholder="Enter Address" id="address" aria-describedby="" rows="3"><?php if(isset($address)){echo $address->getValue();} ?></textarea>
            <span class="err-msg"><?php if (isset($address)) echo $address->getValidError();?></span>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-6">
                <label for="age" class="input-label">Age *</label>
                <input type="number" name="age" class="form-control input-field" placeholder="Enter Age" id="age" min="1" max="99" aria-describedby=""
                       value="<?php if (isset($age)) echo $age->getValue();?>">
                <span class="err-msg"><?php if (isset($age)) echo $age->getValidError();?></span>
            </div>
            <div class="form-group col-md-6 col-sm-6">
                <label for="mobile" class="input-label">Mobile Number *</label>
                <input type="tel" name="mobile" class="form-control input-field" placeholder="Enter Telephone Number" id="mobile" aria-describedby=""
                       value="<?php if (isset($mobile)) echo $mobile->getValue();?>">
                <span class="err-msg"><?php if (isset($mobile)) echo $mobile->getValidError();?></span>
            </div>

        </div>

        <div class="form-group">
            <label for="district" class="input-label">District *</label>


            <input type="text" name="district" class="form-control input-field" placeholder="Enter Your District" id="district" aria-describedby=""
                   value="<?php if (isset($district)) echo $district->getValue();?>">
            <span class="err-msg"><?php if (isset($district)) echo $district->getValidError();?></span>

        </div>

        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary submit-button">Submit</button>
        </div>
    </form>

</div>

