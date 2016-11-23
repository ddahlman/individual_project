/*Sidebar=============================================================================================*/

$(document).ready(function () {

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



    /*end of sidebar======================================================================*/
    /*Social media plugin=================================================================*/

    $('.share').ShareLink({
        title: 'Daniel Dahlman',
        text: 'Visit my website!',
        image: 'http://danieldahlman.se/img/daniel%20gbg%20copy%20smaller.jpg',
        url: 'http://www.danieldahlman.se',
        class_prefix: 's_'
    });



    /*End of social media =================================================================*/
    /*Expand function =====================================================================*/



    /*hämtar alla element i dokumentet som matchar css class .expand som ett nodelist-objekt*/
    var expand = document.querySelectorAll('.expand');
    /*konverterar arrayliknande objektet tillen riktig array, slice hämtar nu en del av den nya arrayen(det array liknande objektet) 
    Vi lagrar det första elementet ur vår nya array i expandArray*/
    var expandArray = Array.prototype.slice.call(expand, 0);


    /*gör en forEach-loop på expandArray a[data-toggle="expand"]=knapp, myinfo=det som ska expanderas, plus=den knappens fa-klass */
    expandArray.forEach(function (el) {
        var button = el.querySelector('a[data-toggle="expand"]'),
            info = el.querySelector('.myInfo'),
            plus = button.querySelector('i.fa.fa-plus-circle');
        /*e.preventDefault gör så att man inte följer URLen om man klickar på länken*/
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
                e.preventDefault();
            }
        };
    });
    /*checking if this element contains this class, creating jquerys "hasclass method"
    parametern kollar om det finns den här klassen någonstans i selektorn*/
    Element.prototype.hasClass = function (className) {
        return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);
    };

    /*CountDown function======================================================================================*/




    function countDownLia() {

        var now = new Date();
        var currentTime = now.getTime();
        var lia = new Date(2018, 0, 15);
        var liaTime = lia.getTime();
        var remainTime = liaTime - currentTime;

        var sec = Math.floor(remainTime / 1000);
        var min = Math.floor(sec / 60);
        var hour = Math.floor(min / 60);
        var day = Math.floor(hour / 24);

        hour %= 24;
        min %= 60;
        sec %= 60;

        hour = (hour < 10) ? "0" + hour : hour;
        min = (min < 10) ? "0" + min : min;
        sec = (sec < 10) ? "0" + sec : sec;

        document.getElementById("days1").innerText = day + " " + ":";
        document.getElementById("hours1").innerText = hour + " " + ":";
        document.getElementById("minutes1").innerText = min + " " + ":";
        document.getElementById("seconds1").innerText = sec;

        setTimeout(countDownLia, 1000);
    }

    countDownLia();

    function countDownExam() {

        var now = new Date();
        var currentTime = now.getTime();
        var exam = new Date(2018, 4, 31);
        var examTime = exam.getTime();
        var remainTime = examTime - currentTime;

        var sec = Math.floor(remainTime / 1000);
        var min = Math.floor(sec / 60);
        var hour = Math.floor(min / 60);
        var day = Math.floor(hour / 24);

        hour %= 24;
        min %= 60;
        sec %= 60;

        hour = (hour < 10) ? "0" + hour : hour;
        min = (min < 10) ? "0" + min : min;
        sec = (sec < 10) ? "0" + sec : sec;

        document.getElementById("days2").innerText = day + " " + ":";
        document.getElementById("hours2").innerText = hour + " " + ":";
        document.getElementById("minutes2").innerText = min + " " + ":";
        document.getElementById("seconds2").innerText = sec;

        /*detta blir en loop som sätts igång varje 1000ms*/
        setTimeout(countDownExam, 1000);
    }


    countDownExam();

});