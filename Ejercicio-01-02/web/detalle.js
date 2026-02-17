import { User } from "./User.js";
import { Storage } from "./Storage.js";

// Referencias
const detalleUser = document.getElementById("detalle-user");


// Función para obtener esos datos
function cargarUsuario(){
    detalleUser.innerHTML = "";
    const sessionData = localStorage.getItem("session");

    console.log('detalle.js - sessionData:', sessionData);

    if (!sessionData) {
        detalleUser.innerHTML = "<p>No hay sesión activa</p>";
        return;
    }
    
    // cogemos la sesión para almacenarla
    const session = JSON.parse(sessionData);
    const email = session.email; // correo email
    // los usuarios
    let arrayUsers = Storage.getCollection("usuarios");
    console.log('detalle.js - usuarios en storage:', arrayUsers);

    const usuarioEncontrado = arrayUsers.find((user) => user.email === email);
    if (usuarioEncontrado){
        const fila = document.createElement("div");
        fila.innerHTML = 
        `<span><strong>ID: ${usuarioEncontrado.id || '—'}</strong></span>
        <p><strong>Fecha:</strong> ${usuarioEncontrado.registro || '—'}</p>
        <p><strong>Nombre:</strong> ${usuarioEncontrado.nombre || '—'} ${usuarioEncontrado.apellidos || ''}</p>
        <p><strong>Email:</strong> ${usuarioEncontrado.email}</p>
        <p><strong>Password:</strong> ${usuarioEncontrado.password || '—'}</p>`;
        detalleUser.appendChild(fila);
    } else {
        console.log('detalle.js - usuario no encontrado para email:', email);
        detalleUser.innerHTML = "<p>Usuario no encontrado en el storage</p>";
    }
}

// Al abrir la página, mostramos lo que ya esté guardado
document.addEventListener("DOMContentLoaded", cargarUsuario);