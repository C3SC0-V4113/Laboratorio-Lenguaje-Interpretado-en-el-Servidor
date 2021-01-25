var lienzo = document.getElementById("canvas1");
var lienzo2 = document.getElementById("canvas2");
redimensionar(lienzo);
redimensionar(lienzo2);
var c = lienzo.getContext('2d');
var d=lienzo2.getContext('2d');

var radius = 50;
var x = (Math.random() * innerWidth)+radius;
var y = (Math.random() * innerHeight)+radius;
var z = (Math.random() * innerWidth)+radius;
var w = (Math.random() * innerHeight)+radius;
var dx = 4;
var dy = 4;
var dz = 2;
var dw = 2;

function animate() {
    requestAnimationFrame(animate);
    c.clearRect(0, 0, innerWidth, innerHeight);
    c.beginPath();
    c.arc(x, y, radius, 0, Math.PI * 2, false);
    c.strokeStyle = "rgb(59,178,184,1)";
    c.stroke();
    c.fillStyle = "rgb(66,230,149)";
    c.fill();
    //
    d.clearRect(0, 0, innerWidth, innerHeight);
    d.beginPath();
    d.arc(z, w, 35, 0, Math.PI * 2, false);
    d.strokeStyle = "rgb(66,230,149)";
    d.stroke();
    d.fillStyle = "rgb(59,178,184,1)";
    d.fill();
    /**
     * Control de colisiones
     */
    if (x + radius > innerWidth || x - radius < 0) {
        dx = -dx;
    }
    if (y + radius > innerHeight || y - radius < 0) {
        dy = -dy;
    }
    if (z + radius > innerWidth || z - radius < 0) {
        dz = -dz;
    }
    if (w + radius > innerHeight || w - radius < 0) {
        dw = -dw;
    }
    x += dx;
    y += dy;
    z+=dz;
    w+=dw;
}
function redimensionar(canva){
    canva.width = window.innerWidth;
    canva.height = window.innerHeight;
}
animate();