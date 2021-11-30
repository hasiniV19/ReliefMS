<?php

?>

<!--<body class="bg-light">-->
<style>
    <?php include "css/raiseFundForm.css"; ?>
</style>


<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-1"></div>
        <div class="py-5 text-center col-lg-auto col-md-auto col-auto   col-md-8 col-10 ">
            <h2 class="title">Your Donation Will Make a Difference</h2>
            <p class="lead">Your donation will be added to our separate Epsilon foundation fund and will be monitered by
                our
                team and deplay it to reach needies.</p>
        </div>
        <div class="col-lg-2 col-md-2 col-1"></div>
    </div>

    <div class="row">
        <form class="container form-container needs-validation col-lg-8 col-md-8 col-10 py-3" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName" class="input-label">First name</label>
                    <input type="text" class="form-control input-field" id="firstName" placeholder="First name" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName" class="input-label">Last name</label>
                    <input type="text" class="form-control input-field" id="lastName" placeholder="Last name" value="" required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <label for="nic" class="input-label">NIC Number</label>
                <input type="email" class="form-control input-field" id="nic" placeholder="Your NIC Number">
                <div class="invalid-feedback">
                    Please enter a valid NIC Number.
                </div>
            </div>


            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="mb-3">
                <label for="donation-amount" class="input-label">Enter Your Donation Amount</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rs.</span>
                    </div>
                    <input type="text" class="form-control input-field" id="donation-amount" placeholder="Donation Amount"
                           required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your dontion amount is required.
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="upload-title" class="input-label">Upload a copy(photo) of your deposit slip/transaction receipt.</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input input-field" id="inputGroupFile04"
                               aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label " for="inputGroupFile04">Choose file</label>
                    </div>
                </div>
                <div class="invalid-feedback">
                    Please upload a copy(photo) of your deposit slip or the transaction receipt.
                </div>
            </div>

            <div class="row py-5">
                <div class="col-md-6 mb-3">
                    <img src="img/BOC1.png" alt="Image" style="width:100%">
                </div>

                <div class="col-md-6 mb-3">
                    <img src="img/BOC2.png" alt="Image" style="width:100%">
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block submit-button" type="submit">Donate Now</button>
            <br>
        </form>
    </div>
    <br>
</div>
</div>

<script src="raisefundform-validation.js"></script>
</body>
