<?php

/*** @var $name */
/*** @var $address */
/*** @var $age */
/*** @var $mobile */
/*** @var $district */

?>

<style>
    <?php include "css/donorDetails.css"?>
</style>


<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10">
        <h2 class="title">Donor Details</h2>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="name-title" class="input-title">Name</label>
            </div>
            <div class=" col-md-8">
                <label for="name" class="input-label"><?php if (isset($name)) echo $name; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="address-title" class="input-title">Address</label>
            </div>
            <div class=" col-md-8">
                <label for="address" class="input-label"><?php if (isset($address)) echo $address; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="age-title" class="input-title">Age</label>
            </div>
            <div class=" col-md-8">
                <label for="age" class="input-label"><?php if (isset($age)) echo $age; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="mobile-title" class="input-title">Mobile Number</label>
            </div>
            <div class=" col-md-8">
                <label for="mobile" class="input-label"><?php if (isset($mobile)) echo $mobile; ?></label>
            </div>
        </div>

        <div class="form-row">
            <div class=" col-md-4">
                <label for="district-title" class="input-title">District</label>
            </div>
            <div class=" col-md-8">
                <label for="district" class="input-label"><?php if (isset($district)) echo $district; ?></label>
            </div>
        </div>

        <hr class="mb-4">
        <div class="form-row" >
            <div class="col-md-6 list">
                <h4 class="type-title">Aid Donations</h4>
                <div class="row">
                    <div class=" don-list  col-12">
                        <div class='box-container'>
                            <div class='box'>
                                <h2 class=''>Donation id</h2>
                                <div class='status-bar border border-warning text-warning'>pending</div>
                                <a class='link ' href='' >View</a>
                            </div>
                        </div>

                    </div>
                    <div class=" don-list col-12">
                        <div class='box-container'>
                            <div class='box'>
                                <h2 class=''>Donation id</h2>
                                <div class='status-bar border border-warning text-warning'>pending</div>
                                <a class='link ' href='' >View</a>
                            </div>
                        </div>

                    </div>
                </div>






            </div>

            <div class="col-md-6 list">
                <h4 class="type-title">Money Donations</h4>
                <div class="row">
                    <div class=" don-list  col-12">
                        <div class='box-container'>
                            <div class='box'>
                                <h2 class=''>Donation id</h2>
                                <div class='status-bar border border-warning text-warning'>pending</div>
                                <a class='link ' href='' >View</a>
                            </div>
                        </div>

                    </div>
                    <div class=" don-list  col-12">
                        <div class='box-container'>
                            <div class='box'>
                                <h2 class=''>Donation id</h2>
                                <div class='status-bar border border-warning text-warning'>pending</div>
                                <a class='link ' href='' >View</a>
                            </div>
                        </div>

                    </div>
                    <div class=" don-list  col-12">
                        <div class='box-container'>
                            <div class='box'>
                                <h2 class=''>Donation id</h2>
                                <div class='status-bar border border-warning text-warning'>pending</div>
                                <a class='link ' href='' >View</a>
                            </div>
                        </div>

                    </div>
                </div>



            </div>

        </div>





<!--        <div class="text-center" >-->
<!--            <button type="submit" class="btn btn-primary go-back-button">Go Back</button>-->
<!--        </div>-->

    </form>

</div>
