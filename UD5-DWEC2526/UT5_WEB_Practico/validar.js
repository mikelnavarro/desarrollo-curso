import { Storage } from './Storage.js';
import { User } from './User.js';

const formLogin = document.getElementById("formularioLogin");
// Storage
const storage = new Storage();
const usuario = new User();
const liUsuarios = storage.save() || [];

formLogin.addEventListener("submit", function (e) {

    e.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Validacion
    if (username && password) {
        window.location.replace('jugar.html');
    } else {
        const userNew = new User(username,password);
        liUsuarios.push(userNew);
        storage.save(liUsuarios);
        window.location.replace('jugar.html');
    }
});


// Funciones de Validación

/* Funcion de validacion user */
function validateUsername(username) {
  if (username.value.length == 0) {
    username.setCustomValidity("Introduce usuario correcto");
  } else if (liUsuarios.includes(username.value)) {
    username.setCustomValidity("Introduce otro nombre");
  }
}
function validatePassword(password) {
    if (password.value.length < 3){
        password.setCustomValidity("Introduce otra constraseña.");
    } else {
        password.setCustomValidity("");
    }
}