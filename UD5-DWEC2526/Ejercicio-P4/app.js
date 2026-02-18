import { Img } from "./Img.js";
import { Storage } from "./Storage.js";
import { User } from "./User.js";
// Referencias
const nuevaImagen = document.createElement("img");

const formulario = document.getElementById("formInput");

// Formulario
formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  const numeroGlobos = document.getElementById("nglobos").value;
  let fechaActual = new Date().getDate(); // fecha de hoy

  if (numeroGlobos <= fechaActual && numeroGlobos >= 15) {
    numeroGlobos = Math.max(15, fechaActual);
  }
  let miImagen = generarNumeroGlobos(numeroGlobos);
  // Llama a moverImagen cada 100ms
  setInterval(() => {
    miImagen.move(container, 50, 50);
  }, 20);
});

// funcion para generar numero de globos
function generarNumeroGlobos(numeroGlobos) {
  const GREEN = 0;
  const BLUE = 1;
  const RED = 2;
  const YELLOW = 3;
  for (const color = 0; color <= 3; color++) {
    for (const i = 0; i <= numeroGlobos; i++) {
      const i = new Img(`//img/${color}Circle`, `bola de Color${color}`, 50, 50, 3, 2);
      // indicar fuente url
    }
  }
  // Una sola bola
  const container = document.getElementById("canvas2"); // puede ser <main>
}
