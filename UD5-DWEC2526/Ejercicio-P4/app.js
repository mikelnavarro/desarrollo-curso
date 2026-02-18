import { Img } from "./Img.js";
import { Storage } from "./Storage.js";
import { User } from "./User.js";
// Referencias
const nuevaImagen = document.createElement("img");

const formulario = document.getElementById("formInput");

// Formulario
formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  let numeroGlobos = document.getElementById("nglobos").value;
  let fechaActual = new Date().getDate(); // fecha de hoy

  if (numeroGlobos <= fechaActual && numeroGlobos >= 15) {
    numeroGlobos = Math.max(15, fechaActual);
  }
  const container = document.getElementById("canvas2");
  // 1.Guardamos el ARRAY de globos
  let listaDeGlobos = generarNumeroGlobos(numeroGlobos, container); 
  // Llama a moverImagen cada 100ms
  setInterval(() => {
  listaDeGlobos.forEach(g => g.move(container, 50, 50));
  },20);
  console.log("moviendose lgobo" + listaDeGlobos.forEach((g)=> g.src));
});

// funcion para generar numero de globos
function generarNumeroGlobos(numeroGlobos,container) {
  const GREEN = 0;
  const BLUE = 1;
  const RED = 2;
  const YELLOW = 3;

  let listaGlobos = [];
  for (let color = 0; color <= 3; color++) {
    for (let i = 0; i <= numeroGlobos; i++) {
      const newGlobo = new Img(`img/GREENCircle.png`, `bola de Color${color}`, 50, 50, 3, 2);
      // Suponiendo que tu clase Img tiene una propiedad .element (o similar)
      if (newGlobo) { 
          container.appendChild(newGlobo.img); 
      }
      listaGlobos.push(newGlobo);
    }
  }
    return listaGlobos;
}
