import { Img } from './Img.js';


// Referencias
const nuevaImagen = document.createElement('img');
// --- IMAGEN DOM ---
// Tendremos que agregar la fuente donde se ubican las bolitas
nuevaImagen.src = "//img/Green_Circle.png"; // indicar fuente url
// provisional
nuevaImagen.alt = 'Una imagen de la carpeta';
nuevaImagen.style.position = "absolute";
document.getElementById("principal").appendChild(nuevaImagen);

// Velocidad de movimiento de la imagen
let vx = 3;
let vy = 2;

// Posición inicial
let imgX = 50;
let imgY = 50;

function moverImagen() {
    imgX += vx;
    imgY += vy;

    // Rebote en los bordes de la ventana
    if (imgX + nuevaImagen.width > window.innerWidth || imgX < 0) vx = -vx;
    if (imgY + nuevaImagen.height > window.innerHeight || imgY < 0) vy = -vy;

    nuevaImagen.style.left = imgX + "px";
    nuevaImagen.style.top = imgY + "px";
}
// Llama a moverImagen cada 100ms
setInterval(moverImagen, 100);