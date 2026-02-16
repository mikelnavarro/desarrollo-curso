import { Storage } from "./Storage.js";
export class User {
  constructor(nombre, apellidos, correo, password, globos) {
    // Atributos autogenerados
    this.id = crypto.randomUUID();
    this.registro = new Date().toLocaleString;
    // atributos que vienen de formulario
    this.nombre = nombre;
    this.apellidos = apellidos;
    this.correo = correo;
    this.password = password;
    this.globos = globos;
  }

  // si tenemos que autenticar el usuario
  static authenticate(correo, password) {
    const users = Storage.obtener("usuarios");

    // Validación:
    if (users.some((u) => u.correo === correo)) {
      return { success: false, msg: "El usuario ya está registrado" };
    }
    if (users.find((u) => u.correo === correo && u.password === password)) {
      return true;
    }
  }
  static create(nombre, apellidos, correo, password, globos) {
    let user = new User(nombre, apellidos, correo, password, globos);
    Storage.pushToCollection("usuarios", {
      nombre,
      apellidos,
      correo,
      password,
      globos
    });
    // quremos agregar a la coleccion
    // 1.en que colección se añade
    // datos enviados
  }
}
