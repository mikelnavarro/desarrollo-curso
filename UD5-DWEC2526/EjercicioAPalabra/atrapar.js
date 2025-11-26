// IMPORTAR
import { Storage } from "./Storage.js";
import { Jugador } from "./Jugador.js";
import { User } from "./User.js";
import { liPalabras } from "./move.js";
const input = document.getElementById("introducirPalabra");
const introducirPalabra = document.getElementById("introducirPalabra");
const log = document.getElementById("log");


input.addEventListener("keyup", palabraInput);

function palabraInput() {
  log.textContent = `Ha introducido ${input.value}`;
}


function addPuntaje() {
    const jugador = new Jugador();
}