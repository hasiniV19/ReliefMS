<?php
/*** @var $user_type */
use app\core\App;


?>

<style>
    <?php include "main.css"?>
</style>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        /* Center the loader */
        #loader {
            transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            height: 65px;
            width: 72px;
            position: absolute;
            top: 50%;
            margin-left: 48.5%;
            margin-right: 48.5%;
        }

        .cssload-tri {
            position: absolute;
            animation: cssload-pulse 862.5ms ease-in infinite;
            -o-animation: cssload-pulse 862.5ms ease-in infinite;
            -ms-animation: cssload-pulse 862.5ms ease-in infinite;
            -webkit-animation: cssload-pulse 862.5ms ease-in infinite;
            -moz-animation: cssload-pulse 862.5ms ease-in infinite;
            border-top: 22px solid rgb(110, 66, 193);
            border-left: 12px solid transparent;
            border-right: 12px solid transparent;
            border-bottom: 0px;
        }

        .cssload-tri.cssload-invert {
            border-top: 0px;
            border-bottom: 22px solid rgb(110, 66, 193);
            border-left: 12px solid transparent;
            border-right: 12px solid transparent;
        }

        .cssload-tri:nth-child(1) {
            left: 24px;
        }

        .cssload-tri:nth-child(2) {
            left: 12px;
            top: 22px;
            animation-delay: -143.75ms;
            -o-animation-delay: -143.75ms;
            -ms-animation-delay: -143.75ms;
            -webkit-animation-delay: -143.75ms;
            -moz-animation-delay: -143.75ms;
        }

        .cssload-tri:nth-child(3) {
            left: 24px;
            top: 22px;
        }

        .cssload-tri:nth-child(4) {
            left: 36px;
            top: 22px;
            animation-delay: -718.75ms;
            -o-animation-delay: -718.75ms;
            -ms-animation-delay: -718.75ms;
            -webkit-animation-delay: -718.75ms;
            -moz-animation-delay: -718.75ms;
        }

        .cssload-tri:nth-child(5) {
            top: 43px;
            animation-delay: -287.5ms;
            -o-animation-delay: -287.5ms;
            -ms-animation-delay: -287.5ms;
            -webkit-animation-delay: -287.5ms;
            -moz-animation-delay: -287.5ms;
        }

        .cssload-tri:nth-child(6) {
            top: 43px;
            left: 12px;
            animation-delay: -287.5ms;
            -o-animation-delay: -287.5ms;
            -ms-animation-delay: -287.5ms;
            -webkit-animation-delay: -287.5ms;
            -moz-animation-delay: -287.5ms;
        }

        .cssload-tri:nth-child(7) {
            top: 43px;
            left: 24px;
            animation-delay: -431.25ms;
            -o-animation-delay: -431.25ms;
            -ms-animation-delay: -431.25ms;
            -webkit-animation-delay: -431.25ms;
            -moz-animation-delay: -431.25ms;
        }

        .cssload-tri:nth-child(8) {
            top: 43px;
            left: 36px;
            animation-delay: -575ms;
            -o-animation-delay: -575ms;
            -ms-animation-delay: -575ms;
            -webkit-animation-delay: -575ms;
            -moz-animation-delay: -575ms;
        }

        .cssload-tri:nth-child(9) {
            top: 43px;
            left: 48px;
            animation-delay: -575ms;
            -o-animation-delay: -575ms;
            -ms-animation-delay: -575ms;
            -webkit-animation-delay: -575ms;
            -moz-animation-delay: -575ms;
        }

        @keyframes cssload-pulse {
            0% {
                opacity: 1;
            }
            16.666% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        @-o-keyframes cssload-pulse {
            0% {
                opacity: 1;
            }
            16.666% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        @-ms-keyframes cssload-pulse {
            0% {
                opacity: 1;
            }
            16.666% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        @-webkit-keyframes cssload-pulse {
            0% {
                opacity: 1;
            }
            16.666% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        @-moz-keyframes cssload-pulse {
            0% {
                opacity: 1;
            }
            16.666% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }

        #main-page {
            display: none;
            /*text-align: center;*/
        }
    </style>
    <title>Homepage</title>
</head>

<body onload="load()"  class="d-flex flex-column min-vh-100">

<div id="loader" class="justify-content-center">
    <div class="cssload-tri cssload-invert"></div>
    <div class="cssload-tri cssload-invert"></div>
    <div class="cssload-tri"></div>
    <div class="cssload-tri cssload-invert"></div>
    <div class="cssload-tri cssload-invert"></div>
    <div class="cssload-tri"></div>
    <div class="cssload-tri cssload-invert"></div>
    <div class="cssload-tri"></div>
    <div class="cssload-tri cssload-invert"></div>
</div>
<div style="display: none" class="animate-bottom" id="main-page">
<header>
    <nav id="navbar" class="navbar navbar-expand-lg   fixed-top">
        <a id="logo" href="<?php echo 'http://localhost:8080/'?>" class="d-none d-md-block d-lg-block">
            <img src="img/logo2.png" class="img-fluid " width="80">
        </a>

        <a id="name" class="navbar-brand" href="<?php echo 'http://localhost:8080/'?>">Epsilon Foundation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <?php $user_type = App::$app->session->get('user_type') ?>
                    <a class="nav-link" href="<?php if($user_type === 'admin') echo 'http://localhost:8080/adminHome';
                    elseif ($user_type === 'donor') echo 'http://localhost:8080/donorHome';
                    else echo 'http://localhost:8080/'?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo 'http://localhost:8080/login'?>">Donate</a>
                </li>
                <li class="nav-item">
                    <?php if($user_type === 'admin' || $user_type === 'donor'){ ?>
                        <a class="nav-link" href="<?php echo 'http://localhost:8080/logout'?>">Logout</a>
                    <?php }else{ ?>
                        <a class="nav-link" href="<?php echo 'http://localhost:8080/login'?>">Login</a>
                    <?php } ?>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</header>


{{content-body}}

<footer class="footer-16371 mt-auto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <div class="footer-site-logo mb-4">
                    <a href="#">Epsilon Foundation</a>
                </div>
                <ul class="list-unstyled nav-links mb-5">
                    <?php $user_type = App::$app->session->get('user_type') ?>
                    <li><a href="<?php if($user_type === 'admin') echo 'http://localhost:8080/adminHome';
                        elseif ($user_type === 'donor') echo 'http://localhost:8080/donorHome';
                        else echo 'http://localhost:8080/'?>">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="<?php echo 'http://localhost:8080/login'?>">Donate</a></li>
                    <li>    <?php if($user_type === 'admin' || $user_type === 'donor'){ ?>
                            <a class="" href="<?php echo 'http://localhost:8080/logout'?>">Logout</a>
                        <?php }else{ ?>
                            <a class="" href="<?php echo 'http://localhost:8080/login'?>">Login</a>
                        <?php } ?></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>

                <div class="social mb-4">
                    <h3>Stay Safe. Stay home.</h3>

                </div>

                <div class="copyright">
                    <small id= "cpy">&copy; Team Epsilon. All Rights Reserved.</small>
                </div>


            </div>
        </div>
    </div>
</footer>
</div>
<script>
    let myVar;

    function load() {
        myVar = setTimeout(showPage, 1000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("main-page").style.display = "block";
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script><?php include "navbarscroll.js"?></script>
<script src="https://kit.fontawesome.com/0141c575ad.js" crossorigin="anonymous"></script>
</body>
</html>
