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


    /*admin cv list-items====================================================*/

    var addLi = document.getElementById('addLi');
    addLi.addEventListener('click', addToListAdmin);

    function addToListAdmin(e) {
        e.preventDefault();
        var li = document.createElement('li');
        var listItem = document.createElement('input');
        listItem.setAttribute('name', 'list-item');

        var firstList = document.getElementById('first-list');
        li.appendChild(listItem);
        firstList.appendChild(li);
    }

});