import { Storage } from "./Storage.js";
import { Cancion } from "./Cancion.js";
import { renderSongs } from "./mostrar.js";
const songForm = document.getElementById('songForm');
const feedback = document.getElementById('mensaje-feedback');

// PROTECCION
if (!localStorage.getItem("session")){
    window.location.href = "login.html";
}

songForm.addEventListener("submit", (e) => {
    e.preventDefault();

    // 1. Recolección de datos
    const titulo = document.getElementById('titulo').value.trim();
    const artista = document.getElementById('artista').value.trim();
    const genero = document.getElementById('genero').value;
    const anio = parseInt(document.getElementById('anio').value);
    // Validación de logica de negocio
    if (titulo.length < 3){
        showFeedback("El título debe tener más de tres letras", "red");
        return;
    }
    if (anio > new Date().getFullYear()){
        showFeedback("¿Una canción del futuro? Extraño...", "orange");
    }
    // Creamos la cancion
    const nuevaCancion = new Cancion(titulo, artista, genero, anio);
    // Persistencia
    Storage.pushToCollection("mis_canciones", nuevaCancion);

    // Retroalimentación
    showFeedback("¡Éxito! Canción guardada con el siguiente ID: " + nuevaCancion.id + ".", "green");

});

// Función para Retroalimentación
function showFeedback(msg, color) {
    feedback.innerText = msg;
    feedback.style.color = color;
}