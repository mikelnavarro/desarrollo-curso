import { Storage } from "./Storage.js";
export class User {
  constructor(nombre, apellidos, correo, password) {
    // Atributos autogenerados
    this.id = crypto.randomUUID();
    this.registro = new Date().toLocaleString;
    // atributos que vienen de formulario
    this.nombre = nombre;
    this.apellidos = apellidos;
    this.correo = correo;
    this.password = password;
  }

  static getUsers() {
    return JSON.parse(Storage.getCollection("usuarios"));
  }
  static create(nombre, apellidos, correo, password) {
    const users = Storage.getCollection("usuarios");
    if (users.some((u) => u.email === email)){
      return { success: false, msg: "El usuario ya está registrado"}
    } else {
      Storage.pushToCollection("usuarios", { nombre, apellidos, correo, password });
      return { success: true, msg: "Usuario creado con éxito" };
    }
  }
  
  static obtenerUsuarioPorEmail(correo) {
    
    let users = Storage.getCollection('usuarios');
    return users.find((u) => u.correo === correo);
  }
  static authenticate(email, password) {
    const users = Storage.getCollection("usuarios");
    // Buscamos un usuario que coincida con ambos campos
    // Validación:
    if (users.some((u) => u.correo === email)) {
      return { success: false, msg: "El usuario ya está registrado" };
    }
    if (users.find((u) => u.correo === email && u.password === password)) {
      return true;
    } else {
      return { success: false, msg: "Usuario no encontrado" };
    }
  }
}
