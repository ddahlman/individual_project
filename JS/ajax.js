$(document).ready(function () {
    /*============== Contact form =======================*/
    var nameError;
    var phoneError;
    var emailError;

    $('#name-contact').on('keyup', function () {
        if (/^[a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF_]+( [a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF_]+){1,4}$/.test($(this).val()) && $(this).val().trim() !== "") {
            $(this).closest(".nameInp")
                .removeClass('has-error')
                .addClass('has-success has-feedback')
                .append('<span class="name-validation-icon-ok fa fa-check form-control-feedback"></span>');
            $(".name-validation-icon-remove").remove();
            $('#nameError').hide();
            nameError = true;
        } else {
            $(this).closest(".nameInp")
                .removeClass('has-success')
                .addClass('has-error has-feedback')
                .append('<span class="name-validation-icon-remove fa fa-close form-control-feedback"></span>');

            $(".name-validation-icon-ok").remove();

            nameError = false;

        }
    });

    $('#tfn-contact').on('keyup', function () {
        if (/^(\d[- ]*|\+\d*){8,20}\d$/.test($(this).val()) && $(this).val().trim() !== "") {
            $(this).closest(".numbInp")
                .removeClass('has-error')
                .addClass('has-success has-feedback')
                .append('<span class="tfn-validation-icon-ok fa fa-check form-control-feedback"></span>');
            $(".tfn-validation-icon-remove").remove();
            $('#phoneError').hide();
            phoneError = true;
        } else {
            $(this).closest(".numbInp")
                .removeClass('has-success')
                .addClass('has-error has-feedback')
                .append('<span class="tfn-validation-icon-remove fa fa-close form-control-feedback"></span>');

            $(".tfn-validation-icon-ok").remove();

            phoneError = false;
        }
    });

    $('#email-contact').on('keyup', function () {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val()) && $(this).val().trim() !== "") {
            $(this).closest(".emailInp")
                .removeClass('has-error')
                .addClass('has-success has-feedback')
                .append('<span class="email-validation-icon-ok fa fa-check form-control-feedback"></span>');
            $(".email-validation-icon-remove").remove();
            $('#emailError').hide();
            emailError = true;
        } else {
            $(this).closest(".emailInp")
                .removeClass('has-success')
                .addClass('has-error has-feedback')
                .append('<span class="email-validation-icon-remove fa fa-close form-control-feedback"></span>');

            $(".email-validation-icon-ok").remove();

            emailError = false;
        }
    });


    $('#submitbtn-contact').on('click', function (e) {
        e.preventDefault();
        console.log(nameError, phoneError, emailError);
        if (!nameError || !phoneError || !emailError) {
            if ($('#name-contact').val() === "") {
                $('#nameError').html('Du behöver fylla i namn!');
            } else if (/^[a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF_]+( [a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF_]+){1,4}$/.test($(this).val()) === false) {
                $('#nameError').html('Fyll i fullt namn med mellanslag emellan!');
            }

            if ($('#tfn-contact').val() === "") {
                $('#phoneError').html('Du behöver fylla i telefonnummer!');
            } else if (/^(\d[- ]*|\+\d*){8,20}\d$/.test($(this).val()) === false) {
                $('#phoneError').html('Bara siffror är tillåtet men även + och -');
            }

            if ($('#email-contact').val() === "") {
                $('#emailError').html('Du behöver fylla i email!');
            } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val()) === false) {
                $('#emailError').html('exempel@domän.se!');
            }
        } else {
            let contactinfo = {
                name: document.querySelector('#name-contact').value,
                phone: document.querySelector('#tfn-contact').value,
                email: document.querySelector('#email-contact').value,
                note: document.querySelector('#text-contact').value
            };
            $.post('http://localhost/individual_project/api/?/incoming_msg', contactinfo).then((response) => {
                console.log(response);
                [...document.querySelectorAll('input[type=text], #text-contact')].map(inp => inp.value = '');

                $('.modal').css('display', 'block');
                $('.modal-header, .modal-footer').css('background-color', '#ec9b13');
                $('.closeModal, .btn-again').on('click', () => {
                    $('.modal').css('display', 'none');
                });

                $('.nameInp, .numbInp, .emailInp').removeClass('has-success has-feedback');
                $(".email-validation-icon-ok, .tfn-validation-icon-ok, .name-validation-icon-ok").remove();
            });
        }
    });
});