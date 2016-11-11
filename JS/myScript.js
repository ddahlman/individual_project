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