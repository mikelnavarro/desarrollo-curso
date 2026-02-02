// Referencias
const listaComentarios = document.getElementById("comments");
const tema = document.getElementById("tema");
const fecha = document.getElementById("fecha-creacion");

const comentarios = document.getElementById("comments");
const url = "http://localhost:3200";
async function cargar() {
  try {
    const response = await fetch(`${url}/users`);
    if (!response.ok) {
      throw new Error("No existe ese libro");
    }
    const data = await response.json();

    // 2. Manipular El DOM
    mostrarDom(data);
  } catch (error) {
    console.error("Error al carga:", error);
  }
}
cargar();
function mostrarDom(data) {
comentarios.innerHTML = "";
  lista.innerHTML = "";

  // INNER HTML
  data.forEach((comentarioIndividual) => {
    lista.innerHTML = `
    <p>${comentarioIndividual.tema}</p>
    <p>${comentarioIndividual.fechaCreacion}</p>
    <p>${comentarioIndividual.comentario}</p>
    
    `;


    // Crear nuevos elementos para cada libro
    const li = document.createElement("li");

    // Crear elementos para el ID, título y autor del libro actual
    const IdLibro = document.createElement("span");
    const title = document.createElement("h2");
    const autor = document.createElement("span");

    IdLibro.textContent = `${libro._id}`;
    title.textContent = `${libro.titulo}`;
    autor.textContent = `Autor: ${libro.autor}`;

    IdLibro.className = "libro-id";
    title.className = "libro-titulo";
    autor.className = "libro-autor";
    li.appendChild(IdLibro);
    li.appendChild(title);
    li.appendChild(autor);

    // Añadir el li a la lista
    lista.appendChild(li);
  });
}
