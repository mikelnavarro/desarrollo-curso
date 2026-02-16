import { User } from "User.js";
import { Storage } from "../Storage.js";

// Referencias del DOM

const loginForm = document.getElementById("loginForm");
const errorMsg = document.getElementById("error-msg");
loginForm.addEventListener("submit", (e) => {
  e.preventDefault();

  // referencias
  const inputNombre = document.getElementById("nombre").value.trim();
  const inputApellidos = document.getElementById("apellidos").value;
  const inputCorreo = document.getElementById("email").value.trim();
  const inputPassword = document.getElementById("password").value.trim();

  // VALIDACION esta es general si no se han completado los campos
  if (!inputNombre || !inputApellidos || !inputCorreo || !inputPassword) {
    showError("Todos los campos son obligatorios");
    return;
  }
  // VALIDACION DEL LOCALSTORAGE
  const user = User.create(
    inputNombre,
    inputApellidos,
    inputCorreo,
    inputPassword,
  );
  if (user) {
    localStorage.setItem(
      "session",
      JSON.stringify({ correo: user.correo, active: true }),
    );

    window.location.href = "index.html";
  }
});

// Función para mostrar los errores
function showError(text) {
  errorMsg.innerText = text;
  errorMsg.style.display = "block";
}
