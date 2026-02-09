import { User } from "./User.js";
import { Storage } from "./Storage.js";
// Variables definidas
const loginForm = document.getElementById("formularioLogin");
const errorMessage = document.getElementById("error");
// Storage
const storage = new Storage();
const user = new User(); // Instancia

const listaUsers = storage.load() || []; // Array Users

// Evento del Formulario de Login
loginForm.addEventListener("submit", function (event) {
  event.preventDefault(); // Previene por defecto el envío

  
  // Valores
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  if (username && password){
    validateUsername(username);
    validatePassword(password);
    const nuevoUsuario = new User(username,password,0,3);
    listaUsers.push(nuevoUsuario);
    storage.save(listaUsers);
    window.location.replace('atrapar.html');
  } else if (listaUsers.includes(username)) {
    window.location.replace('atrapar.html');
  } else {
    alert('Por favor, completa ambos campos');
  }

});

// Validaciones
function validateUsername(username) {
  if (username.length <= 0) {
    username.setCustomValidity("Introduce usuario correcto");
  } else if (listaUsers.includes(username.value)) {
    username.setCustomValidity("Introduce otro nombre");
  }
}
function validatePassword(password) {
  if (password.length <= 3) {
    alert("La clave debe tener 3 caracteres o números");
  }
}
function setCustomValidity(parametro){
    errorMessage.innerHTML = "";
    const spanM = document.createElement("span");
    spanM.classList.add('error');
    spanM.innerHTML =
        `${parametro}`;
    errorMessage.appendChild(spanM);
}
