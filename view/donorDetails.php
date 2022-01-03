<?php

/*** @var $name */
/*** @var $address */
/*** @var $age */
/*** @var $mobile */
/*** @var $district */

/*** @var $money_donations */
/*** @var $aid_donations */

?>

<style>
    <?php include "css/donorDetails.css"?>
</style>


<div class="row">
    <form class="container form-container col-lg-6 col-md-8 col-10 " method="post" action="/donorDetails">
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
                    <?php
                    if (empty($aid_donations)) {
                        echo "
                        <div class='don-list  col-12'>
                        <div class='box-container'>
                            <div class=''>
                            No Aid Donations yet
                            </div>
                        </div>
                        </div>";
                    }
                    $donation_num = 1;
                    foreach ($aid_donations as $aid_donation)
                    {
                        echo "
                        
                        <div class='don-list  col-12'>
                        <div class='box-container'>
                            <div class='box'>
                                <h2 class=''>donation $donation_num</h2>";
                        $donation_status = $aid_donation['status'];
                        $donation_id = $aid_donation['donation_id'];

                        $donation_num++;
                        if( $donation_status === "approved"){
                            echo "<div class='status-bar border border-success text-success'>";
                        } else if($donation_status === "declined"){
                            echo "<div class='status-bar border border-danger text-danger'>";
                        }else{
                            echo "<div class='status-bar border border-warning text-warning'>";
                        }
                        echo $donation_status;
                        echo "</div>
                                <a class='link' href='http://localhost:8080/aidDonationDetails?donation_id=";
                        echo $donation_id;
                        echo "'>View</a>
                            </div>
                        </div>

                    </div>
                        
                        ";
                    } ?>

                </div>






            </div>

            <div class="col-md-6 list">
                <h4 class="type-title">Money Donations</h4>
                <div class="row">

                    <?php

                    if (empty($money_donation)) {
                        echo "
                        <div class='don-list  col-12'>
                        <div class='box-container'>
                            <div class=''>
                            No Money Donations yet
                            </div>
                        </div>
                        </div>";
                    }

                    $donation_num = 1;
                    foreach ($money_donations as $money_donation)
                    {
                        echo "
                        
                        <div class='don-list  col-12'>
                        <div class='box-container'>
                            <div class='box'>
                                <h2 class=''>donation $donation_num</h2>";
                        $donation_status = $money_donation['status'];
                        $donation_id = $money_donation['donation_id'];

                        $donation_num++;
                        if( $donation_status === "approved"){
                            echo "<div class='status-bar border border-success text-success'>";
                        } else if($donation_status === "declined"){
                            echo "<div class='status-bar border border-danger text-danger'>";
                        }else{
                            echo "<div class='status-bar border border-warning text-warning'>";
                        }
                        echo $donation_status;
                                echo "</div>
                                <a class='link ' href='http://localhost:8080/moneyDonationDetails?donation_id=$donation_id'>View</a>
                            </div>
                        </div>

                    </div>
                        ";
                    } ?>



                </div>



            </div>

        </div>

    </form>

</div>
