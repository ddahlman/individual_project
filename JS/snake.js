const cw = 10; //segmentets storlek i höjd och bredd
xoffset = cw;
yoffset = 0;
var gamePaused = false;
let canvas;
let ctx;

function init() {
    canvas = document.getElementById('canvas');
    if (canvas.getContext) {
        ctx = canvas.getContext("2d");

        window.addEventListener('resize', resizeCanvas, false);
        window.addEventListener('orientationchange', resizeCanvas, false);
        resizeCanvas();
    } else {
        document.getElementById('notworking').innerHTML = 'Tyvärr så fungerar inte det här spelet i den här webbläsaren...';
    }
}
init();

function resizeCanvas() {
    var imgData = ctx.getImageData(0, 0, canvas.width, canvas.height);

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight - 300;

    ctx.putImageData(imgData, 0, 0);
}


ctx.fillStyle = 'lightgrey';
ctx.fillRect(0, 0, canvas.width, canvas.height);

food();

var array = [{
    l: 50,
    t: 0,
    c: 'red'
}, {
    l: 40,
    t: 0,
    c: 'green'
}, {
    l: 30,
    t: 0,
    c: 'purple'
}, {
    l: 20,
    t: 0,
    c: 'yellow'
}, {
    l: 10,
    t: 0,
    c: 'black'
}];

draw();

var mytimer = setInterval(paint, 150);


function paint() {
    draw(); //skriv ut ormen
    update(); //updatera ormen
}

function draw() {
    //sista segmentet som skall målas vitt efter förflyttning
    var tail = array[array.length - 1];
    //segmentbredd
    w = 10;
    //segmenthöjd
    h = 10;

    //l = left
    //t = top
    if (array[0].l > canvas.width || array[0].t > canvas.height || array[0].l < 0 || array[0].t < 0) {
        clearInterval(mytimer);
        modal();
        document.querySelector('.winOrLoose1').innerHTML = 'Du förlorade...';
        document.querySelector('.winOrLoose2').innerHTML = 'Välj något av alternativen nedan';
        Array.from(document.querySelectorAll('.modal-header, .modal-footer')).map(function (part) {
            part.style.backgroundColor = 'red';
            return part;
        });
        document.querySelector('.modal-h2').innerHTML = "You're a looooooooser!";
    }
    for (var i = 0; i < array.length; i++) {
        var a = array[i];
        ctx.fillStyle = a.c;
        // l = left, t = top
        ctx.fillRect(a.l, a.t, w, h);
    }
    collision(); //kolla om
    ctx.fillStyle = 'lightgrey';
    ctx.fillRect(tail.l, tail.t, w, h);

}

//updatera arrayen
function update() {
    var head = array[0];
    var tail = array[array.length - 1];

    tail.l = head.l + xoffset;
    tail.t = head.t + yoffset;

    array.unshift(tail); //lägg till först
    array.pop(); //ta bort sista
}

function clicker(selector, y, x) {
    document.querySelector(selector).addEventListener('click', function () {
        yoffset = y;
        xoffset = x;
    });
}

function checkBtn() {
    const down = '#down';
    const downY = 10;
    const downX = 0;
    const up = '#up';
    const upY = -10;
    const upX = 0;
    const left = '#left';
    const leftY = 0;
    const leftX = -10;
    const right = '#right';
    const rightY = 0;
    const rightX = 10;

    if (down) clicker(down, downY, downX);
    if (up) clicker(up, upY, upX);
    if (left) clicker(left, leftY, leftX);
    if (right) clicker(right, rightY, rightX);
}

checkBtn();

//pause toggle
document.querySelector('#pause').addEventListener('click', function () {
    if (!gamePaused) {
        mytimer = clearInterval(mytimer);
        gamePaused = true;
    } else if (gamePaused) {
        mytimer = setInterval(paint, 150);
        gamePaused = false;
    }
});

//Läs av pilarna och navigera ormen
document.onkeydown = checkKey;

function checkKey(e) {
    var key = e.which;

    //down
    if (key === 40) {
        yoffset = 10;
        xoffset = 0;
        // up
    } else if (key === 38) {
        yoffset = -10;
        xoffset = 0;
        // left
    } else if (key === 37) {
        yoffset = 0;
        xoffset = -10;
        // right
    } else if (key === 39) {
        yoffset = 0;
        xoffset = 10;
    } else if (key === 32) {
        if (!gamePaused) {
            mytimer = clearInterval(mytimer);
            gamePaused = true;
        } else if (gamePaused) {
            mytimer = setInterval(paint, 150);
            gamePaused = false;
        }
    }
}

function food() {

    wormfood = {
        x: Math.floor(Math.random() * (canvas.width - 0) / 10) * 10,
        y: Math.floor(Math.random() * (canvas.height - 0) / 10) * 10
    };

    ctx.fillStyle = "red";
    ctx.fillRect(wormfood.x, wormfood.y, cw, cw);
}

function collision() {
    var colors = ['red', 'green', 'purple', 'grey'];
    var diffColors = colors[Math.floor(Math.random() * colors.length)];
    if (wormfood.x === array[0].l && wormfood.y === array[0].t) {
        var obj = {
            c: diffColors
        };

        array.push(obj);
        food();
    }
}

function modal() {
    let modal = document.querySelector('.modal');
    modal.style.display = 'block';
    document.querySelector('.closeModal').addEventListener('click', function () {
        modal.style.display = 'none';
    });
}


