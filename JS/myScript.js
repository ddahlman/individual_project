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
    $('.expand .myInfo').hide();

    $('.expand a').on('click', function (e) {
        e.preventDefault();
        // <a>.hitta alla '.myInfo' efter this.med start från detta '.myInfo', ta bort en. toggla detta. 
        $(this).nextAll('.myInfo').slice(0, 1).slideToggle();
    });




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

        $("#days1").html(day + " " + ":");
        $("#hours1").html(hour + " " + ":");
        $("#minutes1").html(min + " " + ":");
        $("#seconds1").html(sec);

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

        $("#days2").html(day + " " + ":");
        $("#hours2").html(hour + " " + ":");
        $("#minutes2").html(min + " " + ":");
        $("#seconds2").html(sec);


        /*detta blir en loop som sätts igång varje 1000ms*/
        setTimeout(countDownExam, 1000);
    }


    countDownExam();

});