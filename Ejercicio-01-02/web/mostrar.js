import { Storage } from "./Storage.js";
import { Cancion } from "./Cancion.js";

// Función que renderiza canciones
export function renderSongs() {
  const cuerpoTabla = document.getElementById("cuerpo-tabla");
  // Obtenemos
  const canciones = Storage.getCollection("mis_canciones");
  // Limpiamos por si acaso
  cuerpoTabla.innerHTML = "";

  canciones.forEach((element) => {
    const fila = document.createElement("tr");

    fila.innerHTML = `
        <td>${element.titulo}</td>
        <td>${element.artista}</td>
        <td>${element.genero}</td>
        <td>${element.anio}</td>
        <td>${element.fechaRegistro}</td>
        <td><button class="btn-borrar" data-id="${element.id}">Eliminar</button></td>`;

    cuerpoTabla.appendChild(fila);
  });
}
renderSongs();

// Al abrir la página, mostramos lo que ya esté guardado
document.addEventListener("DOMContentLoaded", renderSongs);

document.addEventListener("click", (e) => {
  if (e.target.classList.contains("btn-borrar")) {
    const confirmar = confirm("¿Seguro que quieres eliminar esta canción?");
    if (!confirmar) return;
    const idParaBorrar = e.target.getAttribute("data-id");
    // Obtenemos canciones
    const canciones = Storage.getCollection("mis_canciones");
    // La de ese ID
    const filtradas = canciones.filter((c) => c.id !== idParaBorrar);
    localStorage.setItem("mis_canciones", JSON.stringify(filtradas));

    renderSongs();
  }
});
