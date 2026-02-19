import { Img } from "./Img.js";
import { Storage } from "./Storage.js";
import { User } from "./User.js";
// Referencias
const nuevaImagen = document.createElement("img");

const formulario = document.getElementById("formInput");

// Formulario
formulario.addEventListener("submit", (e) => {
  e.preventDefault();

  let numeroGlobos = Number(document.getElementById("nglobos").value);
  let fechaActual = new Date().getDate(); // fecha de hoy
  const maxNumeroGlobos = Math.max(15, fechaActual);


  // Contenedor donde se insertarán los Globos
  const container = document.getElementsByTagName("body")[0];// elemento parecido
  
  // Guardamos el ARRAY de globos
  let listaDeGlobos = generarNumeroGlobos(numeroGlobos, maxNumeroGlobos); 
  
  
  // Llama a moverImagen cada 100ms
  setInterval(() => {
  listaDeGlobos.forEach(g => g.move(container, 50, 50));
  },100);
  console.log("moviendose globo");
});

// funcion para generar numero de globos
function generarNumeroGlobos(numeroGlobos, maxNumeroGlobos) {
  const arrayRutas = [
    "img/redCircle.jpg",
    "img/BLUECircle.png",
    "img/GREENCircle.png",
    "img/YELLOWCircle.png"
  ];
  let listaGlobos = [];

  // Bucle para generar los Globos automáticamente
  for (let i = 0; i < maxNumeroGlobos; i++){
    let color = Math.floor(Math.random() * arrayRutas.length);
    let ruta = arrayRutas[color];

    let newGlobo = new Img(ruta,"GLOBO",50,50,3,3);
    listaGlobos.push(newGlobo);
  }
  
  return listaGlobos;
  
}
