// Referencias
const lista = document.getElementById("lista-libros");

async function cargarLibros() {
  try {
    const response = await fetch("/api/libros");
    // Comprobamos si la respuesta es ok o no
    if (!response.ok) {
      throw new Error("No existe ese libro");
    }
    // Obtenemos los datos
    const data = await response.json();

    // 2. Manipular El DOM
    mostrarDom(data);
  } catch (error) {
    console.error("Error al cargar libros:", error);
  }
};
cargarLibros();
function mostrarDom(data) {
  data.forEach((libro) => {
    const li = document.createElement("li");
    li.textContent = `${libro.id} - ${libro.titulo} (${libro.autor})`;
    lista.appendChild(li);
  });
}

