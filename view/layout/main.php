<?php

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

    <title>Homepage</title>
</head>
<body>
<header>
    <nav id="navbar" class="navbar navbar-expand-lg   fixed-top">
        <img src="img/logo2.png" class="img-fluid " width="80">
        <a class="navbar-brand" href="#">Epsilon Foundation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Donate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
{{content-body}}

<div class="container-fluid pb-0 mb-0 justify-content-center text-light ">

    <footer>
        <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2">
            <div class="col-12">
                <div class="row my-4 row-1 no-gutters">
                    <div class="col-sm-3 col-auto text-center"><small> <span><img src="img/logo.png" class="img-fluid " width="100">Epsilon Foundation</span></small></div>
                    <div class="col-md-3 col-auto "></div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col my-auto text-md-left text-right ">
                        <small> <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid " width="25">Epsilon Foundation</span></small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script><?php include "navbarscroll.js"?></script>
<script src="https://kit.fontawesome.com/0141c575ad.js" crossorigin="anonymous"></script>
</body>
</html>
