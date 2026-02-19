import { Img } from "./Img.js";
import { Storage } from "./Storage.js";
import { User } from "./User.js";
// Referencias
const nuevaImagen = document.createElement("img");
const errorMsg = document.getElementById("errorMsg");
const formulario = document.getElementById("formInput");

// Contenedor donde se insertarán los Globos
const container = document.getElementsByTagName("body")[0];

// cargar datos
cargarDatos();
// Formulario
formulario.addEventListener("submit", (e) => {
  e.preventDefault();

  let numeroGlobos = Number(document.getElementById("nglobos").value);

  let fechaActual = new Date().getDate(); // fecha de hoy
  const maxNumeroGlobos = Math.max(15, fechaActual);

  if (numeroGlobos > maxNumeroGlobos) {
    showError("Ha excedido el límite" + " Límite: " + maxNumeroGlobos);
    return;
  }
  iniciarMovimiento(numeroGlobos, maxNumeroGlobos);
});

// funcion para generar numero de globos
function generarNumeroGlobos(numeroGlobos, maxNumeroGlobos) {
  // estas son las rutas de imágenes
  const arrayRutas = [
    "img/redCircle.jpg",
    "img/BLUECircle.png",
    "img/GREENCircle.png",
    "img/YELLOWCircle.png",
  ];
  let listaGlobos = [];

  // Bucle para generar los Globos automáticamente
  for (let i = 0; i < numeroGlobos; i++) {
    let color = Math.floor(Math.random() * arrayRutas.length);
    let ruta = arrayRutas[color];
    let newGlobo = new Img(ruta, "GLOBO", 50, 50);
    listaGlobos.push(newGlobo);
  }

  return listaGlobos;
}

// Mover

let tiempoInicio;
let gameInterval;
let juegoCongelado;
function iniciarMovimiento(numeroGlobos, maxNumeroGlobos) {
  if (juegoCongelado || gameInterval) {
    return false;
  }
  // Guardamos el ARRAY de globos
  let listaDeGlobos = generarNumeroGlobos(numeroGlobos, maxNumeroGlobos);
  // Llama a moverImagen cada 100ms
  gameInterval = setInterval(() => {
    listaDeGlobos.forEach((g) => g.move(container, 50, 50));
  }, 100);

  console.log("moviendose globo");
}

function congelarJuego() {
  if (juegoCongelado) {
    return;
  }
  console.log("¡Juego congelado!");
  clearInterval(gameInterval); // Detiene el movimiento
  gameInterval = null;
  juegoCongelado = true;

  // Pasados 2000ms
  setTimeout(() => {
    juegoCongelado = false;
    iniciarMovimiento();
    console.log("¡Movimiento reanudado!");
  }, 2000);
}

// Función para calcular puntuación después de explotar los globitos
function calcularPuntuacionFinal() {
  const tiempoFin = Date.now();
  const tiempoTotalSegundos = (tiempoFin - tiempoInicio) / 1000;

  // Aplicamos la fórmula especificada del docume
  let puntuacion = 1000 / tiempoTotalSegundos + aciertos * 10 - fallos * 5;

  // Aplicamos multiplicador si pillaste el amarillo
  puntuacion = puntuacion * multiplicadorAmarillo;
}

function cargarDatos(numeroGlobos) {
  const emailSesion = localStorage.getItem("session");
  // lista usuarios
  const listaUsuarios = Storage.obtener("usuarios");
  const userActual = listaUsuarios.find((u) => u.email === emailSesion);
  if (userActual) {
    document.getElementById("email").textContent =
      `Jugador: ${userActual.nombre}`;
    if (document.getElementById("puntos")) {
      document.getElementById("puntos").textContent =
        `Puntos: ${userActual.puntos || 0}`;
    }
  }
}

// Función para mostrar los errores
function showError(text) {
  errorMsg.innerText = text;
  errorMsg.style.display = "block";
}
