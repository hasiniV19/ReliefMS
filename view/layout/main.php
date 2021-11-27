<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>
{{content-body}}

    <!-- Footer -->
<!--    <footer class="page-footer font-small mdb-color pt-4 bg-dark" >-->
<!---->
<!--          -->
<!--        <div class="container-fluid text-center text-md-left">-->
<!---->
<!--              -->
<!--            <div class="row text-center text-md-left mt-3 pb-3">-->
<!---->
<!--                -->
<!--                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">-->
<!--                    <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>-->
<!--                    <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,-->
<!--                        consectetur-->
<!--                        adipisicing elit.</p>-->
<!--                </div>-->
<!--                -->
<!---->
<!--                <hr class="w-100 clearfix d-md-none">-->
<!---->
<!--                -->
<!--                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">-->
<!--                    <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>-->
<!--                    <p>-->
<!--                        <a href="#!">MDBootstrap</a>-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        <a href="#!">MDWordPress</a>-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        <a href="#!">BrandFlow</a>-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        <a href="#!">Bootstrap Angular</a>-->
<!--                    </p>-->
<!--                </div>-->
<!--                -->
<!---->
<!--                <hr class="w-100 clearfix d-md-none">-->
<!---->
<!--               -->
<!--                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">-->
<!--                    <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>-->
<!--                    <p>-->
<!--                        <a href="#!">Your Account</a>-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        <a href="#!">Become an Affiliate</a>-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        <a href="#!">Shipping Rates</a>-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        <a href="#!">Help</a>-->
<!--                    </p>-->
<!--                </div>-->
<!---->
<!--                -->
<!--                <hr class="w-100 clearfix d-md-none">-->
<!---->
<!--                -->
<!--                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">-->
<!--                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>-->
<!--                    <p>-->
<!--                        <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>-->
<!--                    <p>-->
<!--                        <i class="fas fa-envelope mr-3"></i> info@gmail.com</p>-->
<!--                    <p>-->
<!--                        <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>-->
<!--                    <p>-->
<!--                        <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>-->
<!--                </div>-->
<!--                -->
<!---->
<!--            </div>-->
<!--            -->
<!---->
<!--            <hr>-->
<!---->
<!--            -->
<!--            <div class="row d-flex align-items-center">-->
<!---->
<!--                -->
<!--                <div class="col-md-7 col-lg-8">-->
<!---->
<!--                    -->
<!--                    <p class="text-center text-md-left">© 2020 Copyright:-->
<!--                        <a href="https://mdbootstrap.com/">-->
<!--                            <strong> MDBootstrap.com</strong>-->
<!--                        </a>-->
<!--                    </p>-->
<!---->
<!--                </div>-->
                <!-- Grid column -->
<!---->
<!--                 Grid column -->
<!--                <div class="col-md-5 col-lg-4 ml-lg-0">-->
<!---->
<!--                     Social buttons -->
<!--                    <div class="text-center text-md-right">-->
<!--                        <ul class="list-unstyled list-inline">-->
<!--                            <li class="list-inline-item">-->
<!--                                <a class="btn-floating btn-sm rgba-white-slight mx-1">-->
<!--                                    <i class="fab fa-facebook-f"></i>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="list-inline-item">-->
<!--                                <a class="btn-floating btn-sm rgba-white-slight mx-1">-->
<!--                                    <i class="fab fa-twitter"></i>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="list-inline-item">-->
<!--                                <a class="btn-floating btn-sm rgba-white-slight mx-1">-->
<!--                                    <i class="fab fa-google-plus-g"></i>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="list-inline-item">-->
<!--                                <a class="btn-floating btn-sm rgba-white-slight mx-1">-->
<!--                                    <i class="fab fa-linkedin-in"></i>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--                 Grid column -->
<!---->
<!--            </div>-->
<!--             Grid row -->
<!---->
<!--        </div>-->
<!--         Footer Links -->
<!---->
<!--    </footer>-->
    <!-- Footer -->

</body>
</html>
