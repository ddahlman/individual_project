$(document).ready(function () {
    const storage = sessionStorage.getItem('token');
    console.log(storage);
    $.get('http://danieldahlman.se/api/?/login&token=' + storage)
        .then((response) => {
            console.log(response);
            $.get('http://danieldahlman.se/api/?/user/' + response.id).then((result) => {
                console.log(result);
                $('#greeting').html(`Välkommen ${result.name}!`);
            });

        }).fail((jqxhr, status, error) => {
            $('#error2').html(`request failed due to: ${status} and the problem was: ${error}`);
        });
    /*================ logout =======================*/

    $('.logOut').on('click', () => {
        $.ajax({
            url: "http://danieldahlman.se/api/?/login",
            type: "DELETE",
            data: { logout: true },
            success: function (response) {
                session = "&token=" + response.session;
                sessionStorage.clear();
                window.location = 'index.php';
                console.log(session);
            }
        });
    });

});