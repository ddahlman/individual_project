const cw = 10; //segmentets storlek i höjd och bredd
xoffset = cw;
yoffset = 0;
var gamePaused = false;
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext("2d");
ctx.fillStyle = 'white';
const _w = canvas.width;
const _h = canvas.height;
ctx.fillRect(0, 0, _w, _h);
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
    //sista segmentet som skall målas blått efter förflyttning
    var tail = array[array.length - 1];
    //segmentbredd
    w = 10;
    //segmenthöjd
    h = 10;
    if (array[0].l > 490 || array[0].t > 490 || array[0].l < 0 || array[0].t < 0) {
        clearInterval(mytimer);
        alert('game over!');
    }
    for (var i = 0; i < array.length; i++) {
        var a = array[i];
        ctx.fillStyle = a.c;
        // l = left, t = top
        ctx.fillRect(a.l, a.t, w, h);
    }
    collision(); //kolla om
    ctx.fillStyle = 'white';
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
        x: Math.floor(Math.random() * (490 - 0) / 10) * 10,
        y: Math.floor(Math.random() * (490 - 0) / 10) * 10
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