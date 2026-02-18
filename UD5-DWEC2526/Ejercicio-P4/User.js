import { Storage } from "./Storage.js";
export class User {
  constructor(nombre, apellidos, email, password, globos) {
    // Atributos autogenerados
    this.id = crypto.randomUUID();
    this.registro = new Date().toLocaleString;
    // atributos que vienen de formulario
    this.nombre = nombre;
    this.email = email;
    this.password = password;
  }

  // si tenemos que autenticar el usuario
  static authenticate(email, password) {
    const users = Storage.obtener("usuarios");
    if (users.find((u) => u.email === email && u.password === password)) {
      return true;
    }
  }
  static create(nombre, email, password) {
    const users = Storage.getCollection("usuarios");
    if (users.some((u) => (u.email = email))) {
      return { success: false, msg: "El correo ya existe" };
    } else {
      let newUser = new User(nombre, email, password);
      Storage.pushToCollection("usuarios", { newUser });
      return { success: true, msg: "Usuario creado con éxito" };
      // quremos agregar a la coleccion
      // 1.en que colección se añade
    }
  }
  // Obtener usuario
  static obtenerUsuarioPorEmail(email) {
    let users = Storage.obtener("usuarios");
    return users.find((u) => u.email === email);
  }
}
