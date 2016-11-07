var openNav = document.getElementById("openNav");
var openThis = openNav.addEventListener('click', openNavbar);

function openNavbar() {
    document.getElementById("mySidenav").style.width = "250px";
    openNav.style.display = "none";
    document.body.style.backgroundColor = "rgba(0, 0, 0, 0.4)";
}

var closeNav = document.getElementById("closeNav");
var closeThis = closeNav.addEventListener('click', closeNavbar);

function closeNavbar() {
    document.getElementById("mySidenav").style.width = "0";
    openNav.style.display = "block";
    document.body.style.backgroundColor = "#fff";
}