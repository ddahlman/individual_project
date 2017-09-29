$(document).ready(function () {
    /*login form*/
    $('#loginForm').on('click', function (e) {
        e.preventDefault();
        let loginform = '<div class="well col-md-6 col-md-offset-3">' +
            '<h1>Login</h1>' +
            '<form class="form-horizontal">' +
            '<div class="form-group">' +
            '<label for="username">Användarnamn</label>' +
            '<input type="text" id="username" class="form-control inp" placeholder="Användarnamn">' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="password">Lösenord</label>' +
            '<input type="password" id="password" class="form-control inp" placeholder="Lösenord">' +
            '</div>' +
            '<input class="btn btn-info" type="button" id="login-btn" value="Logga in">' +
            '<span id="login-error"></span>' +
            '</form>' +
            '</div>';
        $('#forms').html(loginform);
    });
    /*reg form*/
    $('#regForm').on('click', function (e) {
        e.preventDefault();
        let regform = '<div class="well col-md-6 col-md-offset-3">' +
            '<h1>Registrering</h1>' +
            '<form class="form-horizontal">' +
            '<div class="form-group">' +
            '<label for="username">Användarnamn</label>' +
            '<input type="text" id="reg-username" class="form-control inp" placeholder="Användarnamn">' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="password">Lösenord</label>' +
            '<input type="password" id="reg-password" class="form-control inp" placeholder="Lösenord">' +
            '</div>' +
            '<input class="btn btn-info" type="button" id="reg-btn" value="Registrera dig">' +
            '<span id="reg-success"></span>' +
            '</form>' +
            '</div>';
        $('#forms').html(regform);
    });

    /*Login*/
    var session = "";
    var storage = sessionStorage.getItem('token');


    $('.container').on('click', '#login-btn', function (e) {
        e.preventDefault();
        let login = {
            username: document.getElementById('username').value,
            password: document.getElementById('password').value
        };

        $.post('http://danieldahlman.se/api/?/login', login).then(function (response) {
            session = "&token=" + response.session;

            if (response.session === null || response.session === undefined) {
                let inputs = document.querySelectorAll('.inp');
                Array.from(inputs).map(function (inp) { inp.value = ""; });
                $('#login-error').html('fel login!');
            } else {
                sessionStorage.setItem('token', response.session);
                window.location.href = "home_load.php";

            }
        });
    });

    /*Registration*/
    $('.container').on('click', '#reg-btn', function (e) {
        e.preventDefault();
        let reg = {
            username: document.getElementById('reg-username').value,
            password: document.getElementById('reg-password').value
        };

        $.post('http://danieldahlman.se/api/?/user', reg).then(function (response) {

            let inputs = document.querySelectorAll('.inp');
            Array.from(inputs).map(function (inp) { inp.value = ""; });
            $('#reg-success').html('Du är registrerad!');
        });
    });


    $('.checkLogin').on('click', function () {

        $.get('http://danieldahlman.se/api/?/login' + session)
            .then(function (response) {

            });
    });
});