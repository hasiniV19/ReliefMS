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

        #myDiv {
            display: none;
            text-align: center;
        }
    </style>
    <title>Error</title>
</head>
<body style="background: rgba(111,66,193,0.1);" onload="load()">

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
{{content-body}}
</div>

<script>
    let myVar;

    function load() {
        myVar = setTimeout(showPage, 3000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("main-page").style.display = "block";
    }
</script>
</body>
</html>
