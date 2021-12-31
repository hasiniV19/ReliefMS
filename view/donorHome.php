<?php
use app\core\App;
use app\core\Session;
?>

<style>
    <?php include "css/donorHome.css"; ?>
</style>
<div class="site-section bg-primary-light">
    <div class="container">
        <div class="py-5 text-center">
            <h1 class="admin-title">Donor Home</h1>
        </div>
        <?php if(App::$app->session->getFlash("success")): ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo App::$app->session->getFlash("success");?>
            </div>
        <?php endif;?>
        <div class="row align-items-center">
            <div class="col-lg-1 col-md-1 col-1" ></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/raiseFundForm'?>">
                            <div class="icon-wrap">
                                <span class="button__icon"><i class="fas fa-donate"></i></span>
                            </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/raiseFundForm'?>"><h3 class="text-center">Donate Money</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/approvedRecipients'?>">
                            <div class="icon-wrap">

                                <span class="button__icon"><i class="fas fa-hands-helping"></i></span>
                            </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/approvedRecipients'?>"><h3 class="text-center">Donate Aids</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="media-v1 bg-1">
                            <a href="<?php echo 'http://localhost:8080/donorProfile'?>">
                                <div class="icon-wrap">
                                    <span class="button__icon"><i class="fas fa-user-edit"></i></span>
                                </div>
                            </a>
                            <div class="body">
                                <a href="<?php echo 'http://localhost:8080/donorProfile'?>"><h3 class="text-center">View Profile</h3></a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, debitis!</p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-1" ></div>
        </div>
    </div>
</div>