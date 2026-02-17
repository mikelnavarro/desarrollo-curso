import { User } from "./User.js";
import { Storage  } from "./Storage.js";
// Referencias
const loginForm = document.getElementById("loginForm");
const errorMsg = document.getElementById("error-msg");

// 1. Crear un usuario de prueba si no existe nada en el storage
if (Storage.getCollection("usuarios").length === 0) {
  Storage.pushToCollection("usuarios", {
    nomrbre: "Admin",
    email: "admin@test.com",
    password: "1234",
  });
  console.log("Usuario de prueba creado: admin@test.com / 1234");
}

loginForm.addEventListener("submit", (e) => {
  e.preventDefault(); // Evita que la página se recargue

  const nombre = document.getElementById("nombre").value.trim();
  const apellidos = document.getElementById("apellidos").value;
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;

  // VALIDACION
  if (!nombre || !email || !password) {
    showError("Todos los campos son obligatorios");
    return;
  }
  // VALIDACION DEL LOCALSTORAGE
  const user = User.create(nombre,apellidos,email,password);
  if (user) {
    localStorage.setItem(
      "session",
      JSON.stringify({ email: user.email, active: true }),
    );
    window.location.href = "formSong.html";
  } else {
    showError("Correo o contraseña incorrectos");
  }
});

// Función para mostrar los errores
function showError(text) {
  errorMsg.innerText = text;
  errorMsg.style.display = "block";
}
