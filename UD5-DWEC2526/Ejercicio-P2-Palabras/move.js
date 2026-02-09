import { Storage } from "./Storage.js";

const container = document.getElementById("idPalabras");
const liPalabras = ["Spain", "Germany", "France", "Italy", "Russia", "Turkey"];

// ANIMAMOS PALABRA
function animateWord(word) {
  let top = -50;
  const animationInterval = setInterval(() => {
    top += 2; // Moverse 2 píxeles por intervalo
    word.style.top = top + "px";
    if (top > window.innerHeight) {
      clearInterval(animationInterval);
      word.remove();
    }
  }, 50);
}

// UTILIZAMOS setInterva(l() PARA MOVER EN INTERVALO
setInterval(() => {
  const indiceAleatorio = Math.floor(Math.random() * liPalabras.length);
  let palabras = liPalabras[indiceAleatorio];
  if (indiceAleatorio < liPalabras.length) {
    const newWord = createWord(liPalabras[indiceAleatorio]);
    animateWord(newWord);
  }
}, 1000);

// CREAMOS LA PALABRA
function createWord(palabras) {
  const word = document.createElement("span");
  word.textContent = palabras;
  word.style.position = "absolute";
  word.style.left = Math.random() * 100 + "vw"; // Posición horizontal aleatoria
  word.style.top = "-50px"; // Comienzan por encima de la pantalla
  word.style.color = "blue"; // Puedes cambiar el color
  container.appendChild(word);
  return word;
}

/* Creacion de la palabra y movimiento
function moverLaPalabra() {
  let word = document.getElementById("span");
  let randomY = Math.random() * window.screen.height;
  let randomX = Math.random() * window.screen.width;
  word.style.position = "absolute";
  word.style.top = Math.floor(randomY) + "px";
  word.style.left = Math.floor(randomX) + "px";
  word.classList.add("elemento");
}

*/
