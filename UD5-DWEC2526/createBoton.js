const boton = document.createElement("button");
// Añadir texto
boton.textContent = "Haz clic aquí";

// Añadir atributos
boton.id = "mi-boton";
boton.className = "btn btn-primary";

// Añadir estilos CSS
boton.style.backgroundColor = "#007bff";
boton.style.color = "white";
boton.style.padding = "10px 20px";
boton.style.border = "none";
boton.style.borderRadius = "5px";

// Añadir al DOM
document.body.appendChild(boton);