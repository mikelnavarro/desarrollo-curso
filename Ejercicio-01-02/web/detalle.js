import { User } from "./User.js";
import { Storage } from "./Storage.js";
// Referencias

const detalleUser = document.getElementById("detalle-user");
let email = localStorage.getItem("session").correo;
// const user = User.obtenerUsuarioPorEmail(email);



function cargarUsuario(email){
detalleUser.innerHTML = " ";
let arrayUsers = Storage.getCollection("usuarios");

if (arrayUsers.find((user) => user.correo === email)){
    const fila = document.createElement("p");
    arrayUsers.forEach((user) => {
        fila.innerHTML = 
        `<span><strong>ID: ${user}</strong></span>
        <p>${user.nombre}${user.apellidos}--${user.correo}</p>
        <p>${user.password}</p>`;
    });
    detalleUser.appendChild(fila);
}

}
cargarUsuario(email);



// Al abrir la página, mostramos lo que ya esté guardado
document.addEventListener("DOMContentLoaded", renderSongs);