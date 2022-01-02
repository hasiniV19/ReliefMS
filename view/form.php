<?php
?>

<style>
</style>

<div class="container form-container">
    <div class="title">Application Form for Volunteers</div>
    <form action="/form" method="post">
        <div class="volunteer-details">

            <div class="input-box">
                <span class="detail">Full Name</span>
                <input type="text" name="name" placeholder="Enter Your Fullname" required>
            </div>

            <div class="input-box">
                <span class="detail">Address</span>
                <input type="address" name="address" placeholder="Enter Your Address" required>
            </div>

            <div class="input-box">
                <span class="detail">Age</span>
                <input type="number" name="age" placeholder="Enter Your Age" required>
            </div>

            <div class="input-box">
                <span class="detail">Occupation</span>
                <input type="text" name="occupation" placeholder="Enter Your Occupation" required>
            </div>

            <div class="input-box">
                <span class="detail">Contact Number</span>
                <input type="tel" name="mobile" placeholder="Enter Your Contact Number" required>
            </div>

            <div class="select-day">
                <span class = "days">Available Day: </span>
                <select name="available_day" id="day" required>
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

        <div class="gender-details">
            <input type="radio" name="gender" value="male" id="dot-1">
            <input type="radio" name="gender" value="female" id="dot-2">
            <span class="gender-title">Gender</span>
            <div class="category">
                <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="gender">Male</span>
                </label>
                <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                </label>
            </div>
        </div>

        <div class="vehicle-details">
            <input type="radio" name="have_vehicle" value=1 id="dot-3">
            <input type="radio" name="have_vehicle" value=0 id="dot-4">
            <span class="vehicle-title">Do you have a vehicle?</span>
            <div class="category">
                <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="vehicle">Yes</span>
                </label>
                <label for="dot-4">
                    <span class="dot four"></span>
                    <span class="vehicle">No</span>
                </label>
            </div>
        </div>

        <div class="button">
            <input type="submit" value="Submit">
        </div>
    </form>

</div>