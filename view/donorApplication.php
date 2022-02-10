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

            <select name="district" id="district" class="form-control input-field" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                <option value="Ampara" selected <?php if (isset($district) && $district->getValue() == "Ampara") echo "selected"?>>Ampara</option>
                <option value="Anuradhapura" <?php if (isset($district) && $district->getValue() == "Anuradhapura") echo "selected"?>>Anuradhapura</option>
                <option value="Badulla" <?php if (isset($district) && $district->getValue() == "Badulla") echo "selected"?>>Badulla</option>
                <option value="Batticaloa" <?php if (isset($district) && $district->getValue() == "Batticaloa") echo "selected"?>>Batticaloa</option>
                <option value="Colombo" <?php if (isset($district) && $district->getValue() == "Colombo") echo "selected"?>>Colombo</option>
                <option value="Galle" <?php if (isset($district) && $district->getValue() == "Galle") echo "selected"?>>Galle</option>
                <option value="Gampaha" <?php if (isset($district) && $district->getValue() == "Gampaha") echo "selected"?>>Gampaha</option>
                <option value="Hambantota" <?php if (isset($district) && $district->getValue() == "Hambantota") echo "selected"?>>Hambantota</option>
                <option value="Jaffna" <?php if (isset($district) && $district->getValue() == "Jaffna") echo "selected"?>>Jaffna</option>
                <option value="Kalutara" <?php if (isset($district) && $district->getValue() == "Kalutara") echo "selected"?>>Kalutara</option>
                <option value="Kandy" <?php if (isset($district) && $district->getValue() == "Kandy") echo "selected"?>>Kandy</option>
                <option value="Kegalle" <?php if (isset($district) && $district->getValue() == "Kegalle") echo "selected"?>>Kegalle</option>
                <option value="Kilinochchi" <?php if (isset($district) && $district->getValue() == "Kilinochchi") echo "selected"?>>Kilinochchi</option>
                <option value="Kurunegala" <?php if (isset($district) && $district->getValue() == "Kurunegala") echo "selected"?>>Kurunegala</option>
                <option value="Mannar" <?php if (isset($district) && $district->getValue() == "Mannar") echo "selected"?>>Mannar</option>
                <option value="Matale" <?php if (isset($district) && $district->getValue() == "Matale") echo "selected"?>>Matale</option>
                <option value="Matara" <?php if (isset($district) && $district->getValue() == "Matara") echo "selected"?>>Matara</option>
                <option value="Monaragala" <?php if (isset($district) && $district->getValue() == "Monaragala") echo "selected"?>>Monaragala</option>
                <option value="Mullaitivu" <?php if (isset($district) && $district->getValue() == "Mullaitivu") echo "selected"?>>Mullaitivu</option>
                <option value="Nuwara Eliya" <?php if (isset($district) && $district->getValue() == "Nuwara Eliya") echo "selected"?>>Nuwara Eliya</option>
                <option value="Polonnaruwa" <?php if (isset($district) && $district->getValue() == "Polonnaruwa") echo "selected"?>>Polonnaruwa</option>
                <option value="Puttalam" <?php if (isset($district) && $district->getValue() == "Puttalam") echo "selected"?>>Puttalam</option>
                <option value="Ratnapura" <?php if (isset($district) && $district->getValue() == "Ratnapura") echo "selected"?>>Ratnapura</option>
                <option value="Trincomalee" <?php if (isset($district) && $district->getValue() == "Trincomalee") echo "selected"?>>Trincomalee</option>
                <option value="Vavuniya" <?php if (isset($district) && $district->getValue() == "Vavuniya") echo "selected"?>>Vavuniya</option>


            </select>

<!--            <input type="text" name="district" class="form-control input-field" placeholder="Enter Your District" id="district" aria-describedby=""-->
<!--                   value="--><?php //if (isset($district)) echo $district->getValue();?><!--">-->
<!--            <span class="err-msg">--><?php //if (isset($district)) echo $district->getValidError();?><!--</span>-->

        </div>

        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary submit-button">Submit</button>
        </div>
    </form>

</div>

