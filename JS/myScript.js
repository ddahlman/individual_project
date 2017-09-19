/*Sidebar=============================================================================================*/

$(document).ready(function () {

    $("#openNav").on('click', function () {
        $('#mySidenav').css('width', 250);
        $(this).css('display', 'none');
        $('body').addClass('openmenu');
        $('.layer').css('background-color', 'rgba(0, 0, 0, 0.8)');
    });

    $("#closeNav").on('click', function () {
        $('#mySidenav').css('width', 0);
        $("#openNav").css('display', 'block');
        $('body').removeClass('openmenu');
        $('.layer').css('background-color', '');
    });

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

        $(this).find('i').toggleClass('close-expand open');
    });


    /*CountDown function======================================================================================*/

    function countDownLia() {

        var now = new Date();
        var currentTime = now.getTime();
        var lia = new Date(2017, 10, 13);
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

        $("#days1").html(day);
        $("#hours1").html(hour);
        $("#minutes1").html(min);
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

        $("#days2").html(day);
        $("#hours2").html(hour);
        $("#minutes2").html(min);
        $("#seconds2").html(sec);


        /*detta blir en loop som sätts igång varje 1000ms*/
        setTimeout(countDownExam, 1000);
    }
    countDownExam();


    /*easter egg================================*/

    //’secret’ specifies the numerical keystrokes that make up the word “mario”
    var secret = "72657871776578";
    var input = "";
    var timer;

    //The following function sets a timer that checks for user input. You can change the variation in how long the user has to input by changing the number in ‘setTimeout.’ In this case, it’s set for 500 milliseconds or ½ second.
    $(document).keyup(function (e) {
        input += e.which;
        clearTimeout(timer);
        timer = setTimeout(function () {
            input = "";
        }, 500);
        check_input();
    });

    //Once the time is up, this function is run to see if the user’s input is the same as the secret code
    function check_input() {
        if (input === secret) {
            //the code used to reveal mario and the world is then put here 
            window.location = 'easter_egg.php';
        }
    }


});