var openNav = document.getElementById("openNav");
var openThis = openNav.addEventListener('click', openNavbar);

function openNavbar() {
    document.getElementById("mySidenav").style.width = "250px";
}

var closeNav = document.getElementById("closeNav");
var closeThis = closeNav.addEventListener('click', closeNavbar);

function closeNavbar() {
    document.getElementById("mySidenav").style.width = "0";
}