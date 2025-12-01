import { Storage } from './Storage.js';
import { User } from './User.js';
const storage = new Storage();
let liUsuarios = storage.load() || [];
const input = document.getElementById("max");


input.addEventListener("keyup", function (e){
    
    validarGlobo();
    mostrarElementos();
    moveIt(elemento);
})
function validarGlobo() {
    let fecha = new Date();
    const diaActual = fecha.getDate() + 1;
    let maximoGlobo = Math.max(diaActual,15);
    if (input != maximoGlobo){
        input.setCustomValidity("No coincide el numero.");
    } else {
        input.setCustomValidity("");
    }
}


/* Crear Elementos */
export const liPalabras = ["Spain", "Germany", "France", "Italy", "Russia", "Turkey"];
// const imagen = document.getElementById("globoIMG");
const pantallaPrincipal = document.getElementById("principal");
const globo = document.getElementById("globo");
const elemento = document.getElementById("globo");



function mostrarElementos(){

  const indiceAleatorio = Math.floor(Math.random() * liPalabras.length);
  let seleccionar = liPalabras[indiceAleatorio];
  elemento.textContent = seleccionar;
}


// Calcular Puntuacion
function calcularPuntuacion() {

    liUsuarios.forEach((usu) => {
        usu.puntos = 0;
    
    });
}
// Mover Elemento
function moveIt(elemento){
    let randomY = Math.random() * window.screen.height;
    let randomX = Math.random() * window.screen.width;
    elemento.style.position = "absolute";
    elemento.style.top = Math.floor(randomY) + "px";
    elemento.style.left = Math.floor(randomX) + "px";
    elemento.classList.add("elemento");
}
