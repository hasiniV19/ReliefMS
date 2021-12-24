<?php
?>

<style>
    <?php include "css/normalApplication.css"?>
</style>

<div class="row">
    <form method="post" action="/volunteerApplication" class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title py-lg-1 py-sm-8">Volunteer Application</h2>

        <div class="form-group">
            <label for="name" class="input-label">Full Name</label>
            <input name="name" type="text" class="form-control input-field" placeholder="Enter Your Name" id="name" aria-describedby="">
        </div>

        <div class="form-group">
            <label for="address" class="input-label">Address</label>
            <textarea name="address" class="form-control input-field" placeholder="Enter Address" id="address" aria-describedby="" rows="3"></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="input-label">Age</label>
                <input name="age" type="number" class="form-control input-field" placeholder="Enter Age" id="age" min="1" max="99" aria-describedby="">
            </div>
            <div class="form-group col-md-6">
                <label for="mobile" class="input-label">Mobile Number</label>
                <input name="mobile" type="tel" class="form-control input-field" placeholder="Enter Telephone Number" id="mobile" aria-describedby="">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="occupation" class="input-label">Occupation</label>
                <input name="occupation" type="text" class="form-control input-field" placeholder="Enter Occupation" id="occupation" aria-describedby="">
            </div>
            <div class="form-group col-md-6">
                <label for="available_day" class="input-label">Available Day</label>
                <select name="available_day" id="inputState" class="form-control input-field">
                    <option selected disabled hidden>Choose here</option>
                    <option value="sunday">Sunday</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="gender" class="input-label">Gender</label>
                <div class="form-control input-field" style="height: 4.4rem;">
                    <div class="contact-form-radio ">
                        <input class="input-radio100" id="radio1" type="radio" name="gender" value="male">
                        <label class="label-radio100" for="radio1">
                            Male
                        </label>
                    </div>

                    <div class="contact-form-radio">
                        <input class="input-radio100" id="radio2" type="radio" name="gender" value="female">
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
                        <input class="input-radio100" id="radio3" type="radio" name="have_vehicle" value=1>
                        <label class="label-radio100" for="radio3">
                            Yes
                        </label>
                    </div>

                    <div class="contact-form-radio">
                        <input class="input-radio100" id="radio4" type="radio" name="have_vehicle" value=0>
                        <label class="label-radio100" for="radio4">
                            No
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
