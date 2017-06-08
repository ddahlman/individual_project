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



});