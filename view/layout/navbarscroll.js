window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        document.getElementById("navbar").style.backgroundColor="white";


    } else {
        document.getElementById("navbar").style.backgroundColor="#f0ecf9";
        // document.getElementById("navbar").style.opacity="0.1";


    }
}