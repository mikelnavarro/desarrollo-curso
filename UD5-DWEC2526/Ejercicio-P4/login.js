import { Storage } from "./Storage.js";
import { User } from "./User.js";

// Referencias
const formularioLogin = document.getElementById("formLogin");
const errorMsg = document.getElementById("errorMsg");

const usuarioPrueba = User.create("Admin", "admin@gmail.com", "12345");
Storage.pushToCollection("usuarios", usuarioPrueba);
localStorage.setItem(
  "session",
  JSON.stringify({
    nombre: usuarioPrueba.nombre,
    email: usuarioPrueba.email,
  }),
);
// escucha formulario
formularioLogin.addEventListener("submit", (e) => {
  e.preventDefault();
  const nombre = document.getElementById("nombre").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value.trim();
  // VALIDACION BASICA
  if (!email || !password) {
    showError("Todos los campos son obligatorios");
    return;
  }

  const user = User.authenticate(email, password);
  if (user) {
    window.location.href = "form.html";
    localStorage.setItem(
      "session",
      JSON.stringify({
        nombre: user.nombre,
        email: user.email,
      }),
    );
  } else {
    const newUser = User.create(nombre, email, password);
    localStorage.setItem(
      "session",
      JSON.stringify({
        nombre: newUser.nombre,
        email: newUser.email,
      }),
    );
    window.location.href = "form.html";
  }
});

// Función para mostrar los errores
function showError(text) {
  errorMsg.innerText = text;
  errorMsg.style.display = "block";
}
