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
<body >
<header>
    <nav id="navbar" class="navbar navbar-expand-lg   fixed-top">
        <a id="logo" href="<?php echo 'http://localhost:8080/'?>" class="visible-md visible-lg">
            <img src="img/logo2.png" class="img-fluid " width="80">
        </a>

        <a id="name" class="navbar-brand" href="<?php echo 'http://localhost:8080/'?>">Epsilon Foundation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo 'http://localhost:8080/'?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo 'http://localhost:8080/login'?>">Donate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo 'http://localhost:8080/login'?>">Login</a>
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
                    <li><a href="<?php echo 'http://localhost:8080/'?>">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="<?php echo 'http://localhost:8080/login'?>">Donate</a></li>
                    <li><a href="<?php echo 'http://localhost:8080/login'?>">Login</a></li>
                    <li><a href="#">Contact</a></li>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script><?php include "navbarscroll.js"?></script>
<script src="https://kit.fontawesome.com/0141c575ad.js" crossorigin="anonymous"></script>
</body>
</html>

