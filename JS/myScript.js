var openNav = document.getElementById("openNav");
var openThis = openNav.addEventListener('click', openNavbar);
var closeNav = document.getElementById("closeNav");
var closeThis = closeNav.addEventListener('click', closeNavbar);
var layer = document.getElementsByClassName("layer");

function openNavbar() {
    document.getElementById("mySidenav").style.width = "250px";
    openNav.style.display = "none";
    document.body.style.backgroundColor = "rgba(0, 0, 0, 0.4)";
    for (var i = 0; i < layer.length; i++) {
        layer[i].style.backgroundColor = "rgba(0, 0, 0, 0.4)";
    }
}

function closeNavbar() {
    document.getElementById("mySidenav").style.width = "0";
    openNav.style.display = "block";
    document.body.style.backgroundColor = "#fff";
    for (var i = 0; i < layer.length; i++) {
        layer[i].style.backgroundColor = "";
    }
}