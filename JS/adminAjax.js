$(document).ready(function () {
    /*============ Välkomsttext ===============================*/
    $.ajax({
        url: "http://localhost/individual_project/api/?/welcome_text",
        success: (result) => {
            const txt = result.texts[0].welcome_text;
            $('#home-text').val(txt);
        }
    });

    $('#home-submit').on('click', function (e) {
        e.preventDefault();
        var homeText = $('#home-text').val();

        $.ajax({
            type: "PUT",
            url: "http://localhost/individual_project/api/?/welcome_text/1",
            data: { welcome_text: homeText },
            success: (data) => {
                console.log(data);
                $('.alert-success').show().fadeOut(3000);
            }

        });
    });

    /*==================================================================*/
    /*======================= CV first_text ============================*/

    $.ajax({
        url: "http://localhost/individual_project/api/?/cv_text",
        success: (result) => {
            const txt = result.texts[0].first_text;
            $('#first-text').val(txt);
        }
    });

    $('#firstTxt-submit').on('click', function (e) {
        e.preventDefault();
        var firstText = $('#first-text').val();

        $.ajax({
            type: "PUT",
            url: "http://localhost/individual_project/api/?/cv_text/1",
            data: { first_text: firstText },
            success: (data) => {
                $('.alert-success.cv-text').show().fadeOut(3000);
            }
        }).fail((jqxhr, status, error) => {
            console.log(status + ":" + error);
        });
    });
    /*====================================================================*/
    /*==================== cv_grey_headers ===============================*/
    $.ajax({
        url: "http://localhost/individual_project/api/?/cv_headers",
        success: (result) => {
            console.log(result);
            let resultheaders = result.allheaders;
            [...document.querySelectorAll('.header')].map((head, i) => head.value = resultheaders[i].header);
        }
    });

    $('.grey-headers').on('click', function (e) {
        e.preventDefault();

        var id = this.parentNode.childNodes[1].value;
        console.log(id);
        var header = this.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[3].value;
        console.log(header);
        $.ajax({
            type: "PUT",
            url: "http://localhost/individual_project/api/?/cv_headers/" + id,
            data: { header: header },
            success: (data) => {
                var showID = data.id;
                switch (showID) {
                    case "1":
                        $('.alert-success.cv-header-1').show().fadeOut(3000);
                        break;
                    case "2":
                        $('.alert-success.cv-header-2').show().fadeOut(3000);
                        break;
                    case "3":
                        $('.alert-success.cv-header-3').show().fadeOut(3000);
                        break;
                    default:
                        break;
                }

            }
        }).fail((jqxhr, status, error) => {
            console.log(status + ":" + error);
        });
    });

    /*====================================================================*/
    /*==================== cv_lists ===============================*/



});