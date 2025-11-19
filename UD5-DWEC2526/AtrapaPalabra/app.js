

const palabraInput = document.getElementById("atrapaLaPalabra");
const palabras = ["Spain", "Germany", "France", "Italy", "Russia", "Turkey"];

const pantallaPrincipal = document.querySelectorAll(".container");
function mostrarElementos() {
    pantallaPrincipal.classList.add("container");
    const span = document.createElement("span");
    palabras.forEach((palabra) => {
        span.textContent = random(palabra);

    });

    pantallaPrincipal.appendChild(span);
}

mostrarElementos();
