// IMPORTAR
import { Storage } from "./Storage.js";
import { User } from "./User.js";
import { liPalabras } from "./move.js";
const input = document.getElementById("introducirPalabra");
const usuario = new Storage().getUsuario();
const palabrasUser = [];

input.addEventListener('input', (e) => {
    if (e.target.value === liPalabras) {
        usuario.addPuntaje(10);
        e.target.value = '';
    }
});


function addPuntaje(n) {
  usuario.puntos += n;
}
