$(document).ready(function () {

    var correctLetters = ["h", "a", "n", "g", "e", "d"];
    var soWrong = [];
    var keysPressedArray = [];
    var lives = 9;

    var keyCodes = {
        65: "a",
        66: "b",
        67: "c",
        68: "d",
        69: "e",
        70: "f",
        71: "g",
        72: "h",
        73: "i",
        74: "j",
        75: "k",
        76: "l",
        77: "m",
        78: "n",
        79: "o",
        80: "p",
        81: "q",
        82: "r",
        83: "s",
        84: "t",
        85: "u",
        86: "v",
        87: "w",
        88: "x",
        89: "y",
        90: "z",
        221: "å",
        222: "ä",
        192: "ö"
    };
    $('#lives').html('Liv kvar: 9');
    /*append a div to every letter in the word hanged*/
    var tiles = correctLetters.map((letter, i) => $('.letters-to-fill').append('<div id="letter' + i + '" class="correct"></div>'));
    var letter;
    $(document).keydown(function (e) {
        /*writes in the console which letters I've pressed
        e.keyCode is the (key)code I've pressed*/
        letter = keyCodes[e.keyCode];

        var approvedKeys = e.keyCode > 64 && e.keyCode < 91 || e.keyCode === 221 || e.keyCode === 222 || e.keyCode === 192 ? true : false;
        if (!approvedKeys) {
            $('#undefinedChar').html('Du kan bara använda bokstäver');
        } else {
            if ($.inArray(letter, keysPressedArray) !== -1) {
                $('#alreadyPressed').html('Du har redan tryckt på den här bokstaven!!!');
            } else {
                $('#alreadyPressed').html('');
            }
            keysPressedArray.push(letter);
            /*removes duplicates*/
            keysPressedArray = $.unique(keysPressedArray);
            /*loop through all correct letters and add that letter to correct id*/
            var hangedArray = correctLetters.map((hangedChar, i) => hangedChar === letter ? hangedChar = $('#letter' + i).html(letter) : hangedChar = "");
            console.log(hangedArray);
            if ($('#letter0').text().length > 0 &&
                $('#letter1').text().length > 0 &&
                $('#letter2').text().length > 0 &&
                $('#letter3').text().length > 0 &&
                $('#letter4').text().length > 0 &&
                $('#letter5').text().length > 0) {
                setTimeout(Modal, 500);
                $('.winOrLoose1').html('Du vann!!!');
                $('.winOrLoose2').html('Välj något av alternativen nedan');
                $('.modal-h2').html("You're a Wieeener!");

            }
            /*filter keysPressedArray so the new soWrong array is without hanged letters*/
            soWrong = keysPressedArray.filter((value) =>
                value !== "h" &&
                value !== "a" &&
                value !== "n" &&
                value !== "g" &&
                value !== "e" &&
                value !== "d");


            var showHangman = soWrong.map(function (value, i, arr) {
                var txt = "Liv kvar: ";
                if (arr.indexOf(value) === 0) {
                    value = $('#platform').css('display', 'block');
                    value += $('#lives').html(txt + '8');
                }
                if (arr.indexOf(value) === 1) {
                    value = $('#theman-container').css('display', 'block');
                    value += $('#lives').html(txt + '7');

                }
                if (arr.indexOf(value) === 2) {
                    value = $('#embracer').css('display', 'block');
                    value += $('#lives').html(txt + '6');

                }
                if (arr.indexOf(value) === 3) {
                    value = $('#rope').css('display', 'block');
                    value += $('#lives').html(txt + '5');

                }
                if (arr.indexOf(value) === 4) {
                    value = $('#head').css('display', 'block');
                    value += $('#lives').html(txt + '4');

                }
                if (arr.indexOf(value) === 5) {
                    value = $('#h-body').css('display', 'block');
                    value += $('#lives').html(txt + '3');

                }
                if (arr.indexOf(value) === 6) {
                    value = $('#arms').css('display', 'block');
                    value += $('#lives').html(txt + '2');

                }
                if (arr.indexOf(value) === 7) {
                    value = $('#legs').css('display', 'block');
                    value += $('#lives').html(txt + '1');

                }
                if (arr.indexOf(value) === 8) {
                    value = $('#face').css('display', 'block');
                    value += $('#lives').html(txt + '0');
                    setTimeout(Modal, 500);
                    $('.winOrLoose1').html('Du förlorade...');
                    $('.winOrLoose2').html('Välj något av alternativen nedan');
                    $('.modal-header, .modal-footer').css('background-color', 'red');
                    $('.modal-h2').html("You're a looooooooser!");
                }
                return value;
            });

            $('.wrong').html(soWrong);
            $('#undefinedChar').html('');
        }
    });

    /*=================== modal ===============================*/

    function Modal() {
        var theModal = $('#theModal');
        theModal.css('display', 'block');
        $('.closeModal').on('click', function () {
            theModal.css('display', 'none');
        });

    }
});