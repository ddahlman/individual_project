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


window.onload = function () {

    var expand = document.querySelectorAll('.expand');
    var expandArray = Array.prototype.slice.call(expand, 0);

    expandArray.forEach(function (el) {
            var button = el.querySelector('a[data-toggle="expand"]'),
                info = el.querySelector('.myInfo'),
                plus = button.querySelector('i.fa.fa-plus-circle');

            button.onclick = function (e) {
                if (!info.hasClass('show')) {
                    info.classList.add('show');
                    info.classList.remove('hide');
                    plus.classList.add('open');
                    plus.classList.remove('close');
                    e.preventDefault();
                } else {
                    info.classList.remove('show');
                    info.classList.add('hide');
                    plus.classList.remove('open');
                    plus.classList.add('close');
                    event.preventDefault();
                }
            };
        })
        /*checking if this element contains this class, creating jquerys "hasclass method"*/
    Element.prototype.hasClass = function (className) {
        return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);
    };

};