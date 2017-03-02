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

    /********************** inc_message counter ***************/
    (function () {

        var counter = 0;

        var messages = Array.from(document.querySelectorAll('.messages'));
        var showCounter = document.getElementById('counter');

        messages.map(mess => counter += 1);

        showCounter.innerHTML = counter;
    })();

});