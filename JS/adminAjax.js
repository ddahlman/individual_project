$(document).ready(function () {
    function showModal(id, content, url, func) {
        $('.modal').css('display', 'block');
        $('.modal-header, .modal-footer').css('background-color', '#ec9b13');
        $('.modal-msg').html('<strong>"' + content + '" kommer att raderas, är du säker på att du vill göra det?</strong>');
        $('.btn-again').on('click', function () {
            $.ajax({
                url: url + id,
                method: "DELETE"
            }).then(function () {
                $('.modal').css('display', 'none');
                func();
            });
        });
        $('.closeModal, .btn-backhome').on('click', function () {
            $('.modal').css('display', 'none');
        });
    }
    /*============ Välkomsttext första sidan===============================*/
    $.ajax({
        url: "http://localhost/individual_project/api/?/welcome_text",
        success: function (result) {
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
            success: function (data) {
                $('#home-success').show().fadeOut(3000);
            }

        });
    });

    /*==================================================================*/
    /*======================= CV first_text ============================*/

    $.ajax({
        url: "http://localhost/individual_project/api/?/cv_text",
        success: function (result) {
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
            success: function (data) {
                $('#cv-text').show().fadeOut(3000);
            }
        }).fail(function (jqxhr, status, error) {
        });
    });
    /*====================================================================*/
    /*==================== cv_grey_headers ===============================*/


    function getHeadersAndLists() {
        $.ajax({
            url: "http://localhost/individual_project/api/?/cv_headers",
            success: function (result) {
                resultheaders = result.allheaders;
                Array.from(document.querySelectorAll('.header')).map(function (head, i) {
                    head.value = resultheaders[i].header;
                    return head.value;
                });
                resultheaders.map(function (obj, i) {
                    $.get('http://localhost/individual_project/api/?/cv_headers/' + obj.headersID + '/items')
                        .then(function (response) {

                            var li = response.header_items.map(function (item) {
                                let listItem = '<li class="list-item">' +
                                    '<form class="form-horizontal li-form">' +

                                    '<div class="form-group has-feedback has-feedback-left">' +
                                    '<input type="hidden" value="' + item.id + '">' +
                                    '<div class="col-md-6">' +
                                    '<input type="text" class="form-control" value="' + item.list_item + '">' +
                                    '<span id="success' + item.id + '" class="fa fa-check form-control-feedback list-success">ändrad!</span>' +
                                    '</div>' +
                                    '</div>' +

                                    '<div class="form-group">' +
                                    '<div class="col-md-12">' +
                                    '<input type="button" class="btn btn-info btn-xs edit-list" value="ändra">' +
                                    '<input type="button" class="btn btn-danger btn-xs delete-list" value="ta bort">' +
                                    '</div>' +
                                    '</div>' +

                                    '</form>' +
                                    '</li>';
                                return listItem;
                            });

                            let id = response.id;

                            switch (id) {
                                case "1":
                                    $('#first-list').html(li);
                                    break;
                                case "2":
                                    $('#second-list').html(li);
                                    break;
                                case "3":
                                    $('#third-list').html(li);
                                    break;
                                default:
                                    break;
                            }
                        });
                    return obj;
                });
            }
        });
    }
    getHeadersAndLists();



    $('.grey-headers').on('click', function (e) {
        e.preventDefault();
        var id = this.parentNode.childNodes[1].value;
        var header = this.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[3].value;
        $.ajax({
            type: "PUT",
            url: "http://localhost/individual_project/api/?/cv_headers/" + id,
            data: { header: header },
            success: function (data) {
                var showID = data.id;
                switch (showID) {
                    case "1":
                        $('#cv-header-1').show().fadeOut(3000);
                        break;
                    case "2":
                        $('#cv-header-2').show().fadeOut(3000);
                        break;
                    case "3":
                        $('#cv-header-3').show().fadeOut(3000);
                        break;
                    default:
                        break;
                }

            }
        }).fail(function (jqxhr, status, error) {
        });
    });

    /*====================================================================*/
    /*==================== cv_lists ===============================*/
    $('.container').on('click', '.edit-list', function (e) {
        e.preventDefault();

        var id = this.parentNode.parentNode.parentNode.querySelector('input[type=hidden]').value;
        var item = this.parentNode.parentNode.parentNode.querySelector('input[type=text]').value;
        $.ajax({
            type: "PUT",
            url: "http://localhost/individual_project/api/?/cv_item/" + id,
            data: { item: item },
            success: function (response) {
                var showID = response.id;
                $('#success' + showID).show().fadeOut(3000);
            }
        }).fail(function (jqxhr, status, error) {
        });
    });

    $('.container').on('click', '.delete-list', function () {
        let id = this.parentNode.parentNode.parentNode.querySelector('input[type=hidden]').value;
        let content = this.parentNode.parentNode.parentNode.querySelector('input[type=text]').value;
        let url = "http://localhost/individual_project/api/?/cv_item/";
        showModal(id, content, url, getHeadersAndLists);
    });

    $('.add').on('click', function (e) {
        e.preventDefault();
        var items = {
            item: this.parentNode.parentNode.querySelector('input[type=text]').value,
            headersID: this.parentNode.parentNode.parentNode.querySelector('.headerVal').value
        };
        $.post('http://localhost/individual_project/api/?/cv_item', items)
            .then(function () {
                this.parentNode.parentNode.querySelector('input[type=text]').value = '';
                getHeadersAndLists();
            });
    });

    /*================ employments ========================================================*/
    function getEmployments() {
        $.get('http://localhost/individual_project/api/?/cv_employment')
            .then(function (response) {
                let employment = response.employments.map(function (obj) {
                    let emp = '<li class="li-form">' +
                        '<form class="form-horizontal">' +
                        '<div class="form-group has-feedback">' +
                        '<input type="hidden" value="' + obj.id + '">' +
                        '<div class="col-md-5">' +
                        '<label class="control-label" for="employment">anställning</label>' +
                        '<input class="form-control" id="employment" type="text" value="' + obj.employment + '">' +
                        '<span class="fa fa-check form-control-feedback list-success emp-success' + obj.id + '">ändrad!</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group has-feedback">' +
                        '<div class="col-md-5">' +
                        '<label class="control-label" for="emp-years">årtal</label>' +
                        '<input class="form-control" id="emp-years" type="text" value="' + obj.year + '">' +
                        '<span class="fa fa-check form-control-feedback list-success emp-success' + obj.id + '">ändrad!</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<div class="col-md-6">' +
                        '<input type="button" class="btn btn-info btn-xs edit-emp" value="spara ändringar">' +
                        '<input type="button" class="btn btn-danger btn-xs delete-emp" value="ta bort">' +
                        '</div>' +
                        '</div>' +
                        '</form>' +
                        '</li>';
                    return emp;
                });
                $('#employments').html(employment);
            });
    }
    getEmployments();

    $('.container').on('click', '.edit-emp', function () {
        let id = this.parentNode.parentNode.parentNode.querySelector('input[type=hidden]').value;
        let emp = {
            employment: this.parentNode.parentNode.parentNode.querySelector('#employment').value,
            year: this.parentNode.parentNode.parentNode.querySelector('#emp-years').value
        };
        $.ajax({
            url: 'http://localhost/individual_project/api/?/cv_employment/' + id,
            method: 'PUT',
            data: emp
        }).then(function (response) {
            var showID = response.id;
            $('.emp-success' + showID).show().fadeOut(3000);
        });
    });

    $('.container').on('click', '.delete-emp', function () {
        let id = this.parentNode.parentNode.parentNode.querySelector('input[type=hidden]').value;
        let emp = {
            employment: this.parentNode.parentNode.parentNode.querySelector('#employment').value,
            year: this.parentNode.parentNode.parentNode.querySelector('#emp-years').value
        };
        let url = "http://localhost/individual_project/api/?/cv_employment/";
        showModal(id, emp.employment, url, getEmployments);
    });

    $('#add-emp').on('click', function (e) {
        e.preventDefault();
        let emp = {
            employment: document.querySelector('#add-employ').value,
            year: document.querySelector('#add-emp-year').value
        };

        $.post('http://localhost/individual_project/api/?/cv_employment', emp)
            .then(function () {
                document.querySelector('#add-employ').value = '';
                document.querySelector('#add-emp-year').value = '';
                getEmployments();
            });
    });

    /*=================== cv-education =======================================*/
    function getEducation() {
        $.get('http://localhost/individual_project/api/?/cv_education')
            .then(function (response) {
                let education = response.educations.map(function (obj) {
                    let edu = '<li class="li-form">' +
                        '<form class="form-horizontal">' +
                        '<div class="form-group has-feedback">' +
                        '<input type="hidden" value="' + obj.id + '">' +
                        '<div class="col-md-5">' +
                        '<label class="control-label" for="education">utbildning</label>' +
                        '<input class="form-control education" id="education" type="text" value="' + obj.school + '">' +
                        '<span class="fa fa-check form-control-feedback list-success edu-success' + obj.id + '">ändrad!</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group has-feedback">' +
                        '<div class="col-md-5">' +
                        '<label class="control-label" for="edu-years">årtal</label>' +
                        '<input class="form-control edu-years" id="edu-years" type="text" value="' + obj.year + '">' +
                        '<span class="fa fa-check form-control-feedback list-success edu-success' + obj.id + '">ändrad!</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<div class="col-md-6">' +
                        '<input type="button" class="btn btn-info btn-xs edit-edu" value="spara ändringar">' +
                        '<input type="button" class="btn btn-danger btn-xs delete-edu" value="ta bort">' +
                        '</div>' +
                        '</div>' +
                        '</form>' +
                        '</li>';
                    return edu;
                });
                $('#educations').html(education);
            });
    }
    getEducation();

    $('.container').on('click', '.edit-edu', function () {
        let id = this.parentNode.parentNode.parentNode.querySelector('input[type=hidden]').value;
        let edu = {
            education: this.parentNode.parentNode.parentNode.querySelector('.education').value,
            year: this.parentNode.parentNode.parentNode.querySelector('.edu-years').value
        };
        $.ajax({
            url: 'http://localhost/individual_project/api/?/cv_education/' + id,
            method: 'PUT',
            data: edu
        }).then(function (response) {
            var showID = response.id;
            $('.edu-success' + showID).show().fadeOut(3000);
        }).fail(function (jqxhr, status, error) {
        });
    });

    $('.container').on('click', '.delete-edu', function () {
        let id = this.parentNode.parentNode.parentNode.querySelector('input[type=hidden]').value;
        let edu = {
            education: this.parentNode.parentNode.parentNode.querySelector('.education').value,
            year: this.parentNode.parentNode.parentNode.querySelector('.edu-years').value
        };
        let url = "http://localhost/individual_project/api/?/cv_education/";
        showModal(id, edu.education, url, getEducation);
    });

    $('#add-edu').on('click', function (e) {
        e.preventDefault();
        let edu = {
            education: document.querySelector('#add-ed').value,
            year: document.querySelector('#add-edu-year').value
        };

        $.post('http://localhost/individual_project/api/?/cv_education', edu)
            .then(function () {
                document.querySelector('#add-ed').value = '';
                document.querySelector('#add-edu-year').value = '';
                getEducation();
            });
    });
    /*===========================================================================*/
    /*                       Portfolio                                           */
    /*===========================================================================*/

    function getUrls() {
        $.get('http://localhost/individual_project/api/?/portfolio').then(function (response) {
            const projects = response.projects.map(function (obj) {
                let project = '<div class="white-bg">' +
                    '<form class="form-horizontal">' +
                    '<div class="form-group">' +
                    '<div class="col-md-6">' +
                    '<label class="control-label">Redigera URL-adress</label>' +
                    '<input type="text" class="form-control edit-url" value="' + obj.url + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<div class="col-md-8">' +
                    '<label class="control-label">Redigera Projekttexten</label>' +
                    '<textarea name="project-text" class="form-control edit-projtext" rows="10">' + obj.project_text + '</textarea>' +
                    '</div>' +
                    '</div>' +
                    '<div>' +
                    '<input type="hidden" value="' + obj.id + '">' +
                    '<input type="button" class="btn btn-info btn-xs edit-proj" value="spara ändringar">' +
                    '<input type="button" class="btn btn-danger btn-xs delete-proj" value="ta bort">' +
                    '<span id="proj-success' + obj.id + '" class="fa fa-check list-success"> ändrad!</span>' +
                    '</div>' +
                    '</form>' +
                    '</div>';

                return project;
            });
            $('#projects').html(projects);
        });
    }
    getUrls();

    $('.container').on('click', '.edit-proj', function () {
        const id = this.parentNode.querySelector('input[type=hidden]').value;

        let proj = {
            url: this.parentNode.parentNode.querySelector('.edit-url').value,
            project_text: this.parentNode.parentNode.querySelector('.edit-projtext').value
        };
        $.ajax({
            url: 'http://localhost/individual_project/api/?/portfolio/' + id,
            method: 'PUT',
            data: proj
        }).then(function (response) {
            var showID = response.id;
            $('#proj-success' + showID).show().fadeOut(3000);
        }).fail(function (jqxhr, status, error) {
        });
    });

    $('.container').on('click', '.delete-proj', function () {
        let id = this.parentNode.querySelector('input[type=hidden]').value;
        let proj = {
            url: this.parentNode.parentNode.querySelector('.edit-url').value,
            project_text: this.parentNode.parentNode.querySelector('.edit-projtext').value
        };
        let url = "http://localhost/individual_project/api/?/portfolio/";
        showModal(id, proj.url, url, getUrls);
    });

    $('#add-project').on('click', function (e) {
        e.preventDefault();
        let proj = {
            url: document.querySelector('#add-url').value,
            project_text: document.querySelector('#add-proj-text').value
        };
        $.post('http://localhost/individual_project/api/?/portfolio', proj)
            .then(function () {
                document.querySelector('#add-url').value = '';
                document.querySelector('#add-proj-text').value = '';
                getUrls();
            }).fail(function (jqxhr, status, error) {
            });
    });

    /*================== Incoming messages =======================================*/
    function getMessages() {
        $.get('http://localhost/individual_project/api/?/incoming_msg').then(function (response) {
            let counter = 0;
            let messages = response.messages.map(function (obj) {
                counter += 1;
                let message = '<div class="well messages">' +
                    '<div class="center-block">' +
                    '<h2><strong>' + obj.name_contact + '</strong></h2><br>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="well note col-md-6">' +
                    '<h3>Kontaktuppgifter</h3>' +
                    '<p>' + obj.phone_contact + '</p>' +
                    '<p>' + obj.email_contact + '</p>' +
                    '<h3>Meddelande</h3>' +
                    '<p>' + obj.note_contact + '</p>' +
                    '</div>' +
                    '</div>' +
                    '<input type="hidden" value="' + obj.id + '">' +
                    '<button type="button" class="btn btn-danger btn-xs delete-msg"><span class="fa fa-remove"></span> ta bort</button>' +
                    '</div>';
                return message;
            });
            $('#messages').html(messages);
            $('.counter').html(counter);
        });
    }
    getMessages();

    $('.container').on('click', '.delete-msg', function () {
        let id = this.parentNode.querySelector('input[type=hidden]').value;
        let msgFrom = this.parentNode.querySelector('strong').innerHTML;
        let url = "http://localhost/individual_project/api/?/incoming_msg/";
        showModal(id, msgFrom, url, getMessages);
    });
    /*========================== about text ==========================*/

    function getAboutText() {
        $.get("http://localhost/individual_project/api/?/about").then(function (response) {
            $('#about-text').val(response.texts[0].text);
        });
    }
    getAboutText();

    $('#about-submit').on('click', function (e) {
        e.preventDefault();
        var aboutText = $('#about-text').val();

        $.ajax({
            type: "PUT",
            url: "http://localhost/individual_project/api/?/about/1",
            data: { text: aboutText },
            success: function () {
                $('#about-success').show().fadeOut(3000);
            }

        });
    });

});