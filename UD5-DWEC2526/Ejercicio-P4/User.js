import { Storage } from "./Storage.js";
export class User {
  constructor(nombre, email, password) {
    // Atributos autogenerados
    this.id = crypto.randomUUID();
    this.registro = new Date().toLocaleString;
    // atributos que vienen de formulario
    this.nombre = nombre;
    this.email = email;
    this.password = password;
    // juego
    this.puntos = 0;
    this.partidas = [];
  }

  // si tenemos que autenticar el usuario
  static authenticate (email, password) {
    const users = Storage.obtener("usuarios") || [];
    if (users.find((u)=> u.email === email && u.password === password)) {
      return true;
    }
  }
  static create(nombre, email, password) {
    const users = Storage.obtener("usuarios");
    if (users.some((u) => (u.email = email))) {
      let newUser = new User(nombre, email, password);
      Storage.pushToCollection("usuarios", { newUser });
      return { success: true, msg: "Usuario creado con éxito" };
      // quremos agregar a la coleccion
      // 1.en que colección se añade
    }
  }
  // Obtener usuario
  obtenerUsuarioPorEmail(email) {
    let users = Storage.obtener("usuarios");
    return users.find((u) => u.email === email);
  }
  guardarPartida(puntuacion, tiempo) {
        const registro = { puntuacion, tiempo, fecha: new Date().toLocaleDateString() };
        this.partidas.push(registro);
        localStorage.setItem(this.email, JSON.stringify(this));
    }
}
