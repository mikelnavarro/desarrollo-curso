import { Storage } from "./Storage.js";
// Referencias

const detalleUser = document.getElementById("detalle-user");
let correo = localStorage.getItem(email);
const storageUser = new Storage();

function cargarUsuario(correo){
detalleUser.innerHTML = " ";
let arrayUsers = Storage.getCollection("usuarios");

arrayUsers.array.forEach((element) => {
    const fila = document.createElement("tr");
    fila.textContent = element.email;
    detalleUser.appendChild(fila);
});

}
cargarUsuario(correo);



// Al abrir la página, mostramos lo que ya esté guardado
document.addEventListener("DOMContentLoaded", renderSongs);