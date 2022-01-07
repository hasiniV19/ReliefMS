window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        document.getElementById("navbar").style.backgroundColor="white";


    } else {
        document.getElementById("navbar").style.backgroundColor="#f0ecf9";
        // document.getElementById("navbar").style.opacity="0.1";


    }
}

$(function () { // Same as document.addEventListener("DOMContentLoaded"...

    // Same as document.querySelector("#navbarToggle").addEventListener("blur",...
    $("#nav-tog").blur(function (event) {
        var screenWidth = window.innerWidth;
        if (screenWidth < 990) {
            $("#navbarSupportedContent").collapse('hide');
        }
    });
});
