// IMPORTAR
import { Storage } from "./Storage.js";
import { Jugador } from "./Jugador.js";
import { User } from "./User.js";
import { liPalabras } from "./move.js";
const input = document.getElementById("introducirPalabra");
const introducirPalabra = document.getElementById("introducirPalabra");
const log = document.getElementById("log");
const palabrasUser = [];


palabrasUser.push(introducirPalabra.value);
introducirPalabra.addEventListener("keyup", (e) => {
  const palabrasUser = liPalabras.forEach(
    (word) => palabrasUser.includes(word),
    addPuntaje()
  );
});

function addPuntaje() {
  const jugador = new Jugador();
}
