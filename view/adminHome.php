<?php

?>

<style>
    <?php include "css/adminHome.css"; ?>
</style>
<div class="site-section bg-primary-light">
    <div class="container">
        <div class="py-5 text-center">
            <h1 class="admin-title">Admin Home</h1>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-1  col-sm-1 col-1" ></div>
            <div class="col-lg-10 col-md-12 col-sm-10 col-10">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-lg-5 mt-md-5">
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/fsRecipients'?>">
                                <div class="icon-wrap">
                                    <span class="button__icon"><i class="fas fa-hands-helping"></i></span>
                                </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/fsRecipients'?>"><h3 class="text-center">Financial Support</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/approvedRecipients'?>">
                                <div class="icon-wrap">
                                    <span class="button__icon"><i class="fas fa-check-circle"></i></span>
                                </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/approvedRecipients'?>"><h3 class="text-center">Approved Recipients</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/donors'?>">
                                <div class="icon-wrap">
                                    <span class="button__icon"><i class="fas fa-donate"></i></span>
                                </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/donors'?>"><h3 class="text-center">Donors</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/volunteers'?>">
                            <div class="icon-wrap">
                                <span class="button__icon"><i class="fas fa-people-carry"></i></span>
                            </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/volunteers'?>"><h3 class="text-center">Volunteers</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-lg-5 mt-md-5">
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/msRecipients'?>">
                            <div class="icon-wrap">
                                <span class="button__icon"><i class="fas fa-ambulance"></i></span>
                            </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/msRecipients'?>"><h3 class="text-center">Medical
                                        <br> Support</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/aidedRecipients'?>">
                            <div class="icon-wrap">
                                <span class="button__icon"><i class="fas fa-first-aid"></i></span>
                            </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/aidedRecipients'?>"><h3 class="text-center">Aided
                                        <br> Recipients</h3></a>
                               <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-sm-1 col-1" ></div>
        </div>
    </div>
</div>