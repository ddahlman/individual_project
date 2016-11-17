/*Sidebar=============================================================================================*/

(function () {

    var openNav = document.getElementById("openNav");
    openNav.addEventListener('click', openNavbar);
    var closeNav = document.getElementById("closeNav");
    closeNav.addEventListener('click', closeNavbar);
    var layer = document.getElementsByClassName("layer");

    function openNavbar() {
        document.getElementById("mySidenav").style.width = "250px";
        openNav.style.display = "none";

        document.body.className = "openmenu";

        for (var i = 0; i < layer.length; i++) {
            layer[i].style.backgroundColor = "rgba(0, 0, 0, 0.8)";
        }
    }

    function closeNavbar() {
        document.getElementById("mySidenav").style.width = "0";
        openNav.style.display = "block";

        document.body.removeAttribute("class");

        for (var i = 0; i < layer.length; i++) {
            layer[i].style.backgroundColor = "";
        }
    }

})();

/*end of sidebar======================================================================*/
/*Social media plugin=================================================================*/
(function () {
    $('.share').ShareLink({
        title: 'Daniel Dahlman',
        text: 'Visit my website!',
        image: 'http://www.jqueryscript.net/images/logo.png',
        url: 'http://www.danieldahlman.se',
        class_prefix: 's_'
    });

})();

/*End of social media =================================================================*/
/*Expand function =====================================================================*/




var toggle = document.getElementsByClassName('toggle');
for (var i = 0; i < toggle.length; i++) {
    toggle[i].addEventListener('click', toggleThis);
}

function toggleThis(e) {

    var myInfo = document.getElementsByClassName('myInfo');
    for (var i = 0; i < myInfo.length; i++) {
        if (myInfo[i].style.display == "none") {
            myInfo[i].style.display = 'block';
        } else {
            myInfo[i].style.display = 'none';
        }
    }
}