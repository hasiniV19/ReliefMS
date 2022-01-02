<?php
use app\handlers\ValidateRequest;
/*** @var $amount */
/*** @var $fileToUpload */
?>

<!--<body class="bg-light">-->
<style>
    <?php include "css/raiseFundForm.css"; ?>
</style>


<div class="container">

    <div class="row">
        <form method="post" action="/raiseFundForm" class="container form-container needs-validation col-lg-8 col-md-8 col-10 py-3" enctype="multipart/form-data">
            <h2 class="title text-center py-3">Your Donation Will Make a Difference</h2>
            <p class="lead text-center py-2 info">Your donation will be added to our fund and will be monitored by our team and deploy to the needies.</p>
            <p class="lead text-center py-2 info"  style="color: #ff6666">Please make sure to mention your name as the narration/description/remark/beneficiary remark to track your payment easily.</p>

            <hr class="mb-4 ">

            <h4 class="mb-3">Payment</h4>

            <div class="mb-3">
                <label for="donation-amount" class="input-label fields">Enter Your Donation Amount</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rs.</span>
                    </div>
                    <input type="text" name="amount" class="form-control input-field" id="donation-amount" placeholder="Donation Amount"
                           value="<?php if (isset($amount)) echo $amount->getValue();?>">
                    <span class="err-msg"><?php if (isset($amount)) echo $amount->getValidError();?></span>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="upload-title" class="input-label fields">Upload a copy(photo) of your deposit slip/transaction receipt.</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file" value="">
                        <div class="err-msg"><?php if (isset($fileToUpload)) echo $fileToUpload->getValidError();?></div>
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


<script src="raisefundform-validation.js"></script>

