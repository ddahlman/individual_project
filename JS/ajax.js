$(document).ready(function () {
    $('#home-submit').on('click', function (e) {
        e.preventDefault();
        var homeText = $('#home-text').val();
        var Data = {
            welcome_text: homeText
        };
        $.ajax({
            type: "POST",
            url: "../hemlig_admin/home_admin.php",
            data: Data,
            success: function (data) {
                console.log(data);
                $('#home-text').html(homeText);
            }

        });
    });


});