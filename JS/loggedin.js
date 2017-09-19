$(document).ready(function () {
    const storage = sessionStorage.getItem('token');

    $.get('http://localhost/individual_project/api/?/login&token=' + storage)
        .then(function (response) {

            $.get('http://localhost/individual_project/api/?/user/' + response.id).then(function (result) {

                $('#greeting').html('Välkommen ' + result.name + '!');
            });

        }).fail(function (jqxhr, status, error) {
            $('#error2').html('request failed due to: ' + status + ' and the problem was: ' + error + '');
        });
    /*================ logout =======================*/

    $('.logOut').on('click', function () {
        $.ajax({
            url: "http://localhost/individual_project/api/?/login",
            type: "DELETE",
            data: { logout: true },
            success: function (response) {
                session = "&token=" + response.session;
                sessionStorage.clear();
                window.location = 'index.php';

            }
        });
    });

});