
<?php

?>

<style>
    <?php include "css/testhome.css"; ?>
</style>
<div class="hero-v1">
    <div id="banner" class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mr-auto text-center text-lg-left">
                <span class="d-block subheading">Covid-19 Awareness</span>
                <h1 class="heading mb-3">Stay Safe. Stay Home.</h1>
                <p class="mb-5">Doing Nothing is Not An Option of Our Life</p>
            </div>
            <div class="col-lg-6">
                <figure class="illustration">
                    <img src="img/home3.png" alt="Image" class="img-fluid"/>
                </figure>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</div>

<main role="main">

    <div id="three" class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <img id="pp" class="bd-placeholder-img rounded-circle" width="140" height="140" src="img/help.jpg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em"></text>
                <h2>Get Help</h2>
                <p> Having someone help you doesn't mean you failed. It just means you're not alone. </p>
                <div class="dropdown show">
                    <a class="btn drop dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Get Help Now &raquo;
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo 'http://localhost:8080/fsrApplication'?>">Financial Support</a>
                        <a class="dropdown-item" href="<?php echo 'http://localhost:8080/msrApplication'?>">Medical Support</a>

                    </div>
                </div>
<!--                <div class="text-center"><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Get Help Now &raquo;</a>-->
<!--                </div>-->
            </div>
            <div class="col-md-4">
                <img id="pp" class="bd-placeholder-img rounded-circle" width="140" height="140" src="img/donate.jpg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em"></text>
                <h2>Donate</h2>
                <p> Making a donation is the ultimate sign of solidarity. Actions speak louder than words. </p>
                <div class="text-center"><a class="btn btn-secondary" href="<?php echo 'http://localhost:8080/login'?>">Donate Now &raquo;</a></div>
            </div>
            <div class="col-md-4">
                <img id="pp" class="bd-placeholder-img rounded-circle" width="140" height="140" src="img/volunteer.jpg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em"></text>
                <h2>Volunteer</h2>
                <p>Volunteering is the core of being a human. No one has made it through life without someone else’s help</p>
                <div class="text-center"><a class="btn btn-secondary" href="<?php echo 'http://localhost:8080/volunteerApplication'?>">Volunteer Now &raquo;</a></div>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<div class="bg-light" id="about">
    <div class="container py-5">
        <div class="row  align-items-center py-5">
            <div class="col-lg-6" >
                <h1 class="display-4">About Us</h1>
                <p class="lead text-muted mb-0 font-weight-bold font-italic">We are a non-profit organization working towards the betterment of the people around the world. </p>
            </div>
            <div class="col-lg-6 d-none d-lg-block"><img src="https://bootstrapious.com/i/snippets/sn-about/illus.png" alt="" class="img-fluid"></div>
        </div>
    </div>
</div>

<div class="bg-white py-5">
    <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                <h2 class="font-weight-light">Our Aim</h2>
                <p class="font-italic text-muted mb-4 font-weight-bold font-italic">Providing a platform for the people who need support and the people who are willing to give a helping hand during this pandemic.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
            </div>
            <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        </div>
        <div class="row align-items-right">
            <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                <h2 class="font-weight-light">Beneficiary</h2>
                <p class="font-italic text-muted mb-4 font-weight-bold font-italic">People who are suffering from financial difficulties </p>
                <p class="font-italic text-muted mb-4 font-weight-bold font-italic">People who have been in home quarantine </p>
                <p class="font-italic text-muted mb-4 font-weight-bold font-italic">People who are willing to give a helping hand</p>
                <a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
            </div>
        </div>
    </div>
</div>

<div class="bg-light py-5" id="contact">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-5">
                <h2 class="display-4 font-weight-light">Our team</h2>
<!--                <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
                <!--Grid column-->
<!---->
                    <ul class="list-unstyled pl-md-5 mb-5">
                        <li class="d-flex text-black mb-2">
                            <span class="mr-3"><span class="fas fa-map-marker-alt"></span></span> No. 25, Epsilonwatta, Galle, Sri Lanka
                        </li>
                        <li class="d-flex text-black mb-2"><span class="mr-3"><span class="fas fa-phone-alt"></span></span> +94 912 230 737</li>
                        <li class="d-flex text-black"><span class="mr-3"><span class="fas fa-envelope"></span></span> contact_us@epsilonfoundation.com </li>
                    </ul>




            </div>
        </div>

        <div class="row text-center" >
            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5" id="contact">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img id="pp" src="img/p2.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Piyumi Chan</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com/piyumichan.mahaarachchi" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/Yume_Chan98" class="social-link"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/__yume_chan__/?hl=en" class="social-link"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/piyumi-chan/" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img id="pp" src="img/d.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Dasith Samarasinghe</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com/dasith.kawmal" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/DasithSamare" class="social-link"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/dasith_98/?hl=en" class="social-link"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/dasith-samarasinghe/" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img id="pp" src="img/h.jpeg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Hasini Madushika</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com/hasini.vijayarathna.3" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/hasiniV19" class="social-link"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/has.m19/?hl=en" class="social-link"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/hasini-madushika-b000a321b/" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img id="pp" src="img/t.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Theshan Wijerathne</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com/theshan.wijerathne98/" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/hesh_w98" class="social-link"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/hesh._98/?hl=en" class="social-link"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/theshan-wijerathne-8892a921b/" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End-->

        </div>
    </div>
</div>