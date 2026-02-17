import { Storage } from "./Storage.js";
export class User {
  constructor(nombre, apellidos, email, password) {
    // Atributos autogenerados (se generan automaticamente)
    this.id = crypto.randomUUID(); // Genera un ID único automáticamente
    this.registro = new Date().toLocaleString();
    // atributos que vienen de formulario (estos SÍ se reciben como parámetros)
    this.nombre = nombre;
    this.apellidos = apellidos;
    this.email = email;
    this.password = password;
  }

  static getUsers() {
    return JSON.parse(Storage.getCollection("usuarios"));
  }
  static create(nombre, apellidos, email, password) {
    const users = Storage.getCollection("usuarios");
    if (users.some((u) => u.email === email)){
      return { success: false, msg: "El usuario ya está registrado"}
    } else {
      const newUser = new User(nombre, apellidos, email, password);
      Storage.pushToCollection("usuarios", newUser);
      return { success: true, msg: "Usuario creado con éxito" };
    }
  }
  
  // Obtener usuario
  static obtenerUsuarioPorEmail(email) {
    let users = Storage.getCollection('usuarios');
    return users.find((u) => u.email === email);
  }

  static authenticate(email, password) {
    const users = Storage.getCollection("usuarios");
    if (users.find((u) => u.email === email && u.password === password)) {
      return true;
    } else {
      return { success: false, msg: "Usuario no encontrado" };
    }
  }
}
