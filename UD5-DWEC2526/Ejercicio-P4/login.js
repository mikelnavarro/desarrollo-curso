import { Storage } from "./Storage.js";
import { User } from "./User.js";

// Referencias
const formularioLogin = document.getElementById("formLogin");
const errorMsg = document.getElementById("errorMsg");

const usuarioPrueba = new User("Admin","admin@gmail.com","12345");
Storage.pushToCollection("usuarios",{usuarioPrueba});
localStorage.setItem("session",{nombre: usuarioPrueba.nombre, email: usuarioPrueba.email})
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
  } else {
    const newUser = User.create(nombre, email, password);
    Storage.pushToCollection("usuarios", { newUser });
    localStorage.setItem("session", {
      nombre: newUser.nombre,
      email: newUser.email
    });
    window.location.href = "form.html";
  }  
});

// Función para mostrar los errores
function showError(text) {
  errorMsg.innerText = text;
  errorMsg.style.display = "block";
}
